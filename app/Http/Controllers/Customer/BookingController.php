<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\BookingRequest;
use App\Model\Admin\Configuration\Venue;
use App\Model\Admin\Operation\BlockedBookingDate;
use App\Model\Customer;
use App\Model\Customer\CustomerBooking;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class BookingController extends Controller
{
    public function index()
    {
        $title = 'Venue Booking | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Venue Booking';
        $page = '';
        $venues = Venue::where('status', 'Active')->get();
        return view('Customer.booking', compact('title', 'venues', 'activeNav', 'page'));

    }

    public function getVenueById($venueId)
    {
        $title = 'Venue | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Venue Booking';
        $page = '';
        $venue = Venue::where('id', $venueId)->with('venueOpeningHours')->first();
        return view('Customer.venue', compact('title', 'venue', 'activeNav', 'page'));
    }

    public function getCustomerVenueBookingById($venueId)
    {
        $response['bookingsAndReservations'] = CustomerBooking::where('venue_id', $venueId)->whereIn('status', ['Booked', 'Reserved'])->with('venue')->get();
        $response['blockedBookingDates'] = BlockedBookingDate::where('venue_id', $venueId)->where('status', 'Active')->get();
        return response()->json($response);
    }

    public function makeValidation(BookingRequest $request)
    {
        return response()->json(['message' => 'Validation Successful']);
    }

    public function save(BookingRequest $request)
    {
        if (Customer::where('id', session('session_id'))->first()->status === 'Casual') {
            Session::forget('venue');
            Session::push('venue', [
                'venue_id' => $request->get('venue_id'),
                'arrival_date_time' => $request->get('arrival_date_time'),
                'starting_date_time' => $request->get('starting_date_time'),
                'ending_date_time' => $request->get('ending_date_time'),
                'number_of_children' => $request->get('number_of_children'),
                'number_of_adult' => $request->get('number_of_adult'),
            ]);
            return response()->json(['message' => 'Create Payment']);
        }

        $venue = Venue::where('id', $request->get('venue_id'))->first();
        $totalHour = (strtotime($request->get('ending_date_time')) - strtotime($request->get('starting_date_time')))/(60*60);
        $data = new CustomerBooking();
        $data->invoice_number = '---';
        $data->customer_id = session('session_id');
        $data->venue_id = $request->get('venue_id');
        $data->price_per_hour = $venue->price_per_hour;
        $data->total_hour = $totalHour;
        $data->cleaning_fee = $venue->cleaning_fee;
        $data->city_fee = $venue->city_fee;
        $data->security_deposit_amount = $venue->security_deposit_amount;
        $data->security_deposit_status = 'Pending';
        $data->arrival_date_time = $request->get('arrival_date_time');
        $data->starting_date_time = $request->get('starting_date_time');
        $data->ending_date_time = $request->get('ending_date_time');
        $data->number_of_children = $request->get('number_of_children');
        $data->number_of_adult = $request->get('number_of_adult');
        $data->result = '---';
        $data->status = 'Booked';
        $data->narrative = '---';
        $data->created_by = session('session_id');
        $data->save();

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "http://hornsbybahais.org.au";
            $mail->Port = 587;
            $mail->setFrom('hbcl@hornsbybahais.org.au', 'Hornsby Bahá’í Centre of Learning');
            $mail->addAddress(Customer::where('id', session('session_id'))->first()->email);
            $mail->isHTML(true);
            $mail->Subject = 'Venue Booking Confirmation!';
            $message = '<h2>Your booking has been confirmed with the following information.</h2>';
            $totalPayable = ($totalHour * $venue->price_per_hour) + $venue->cleaning_fee + $venue->city_fee + $venue->security_deposit_amount;
            $message .= '<table><tbody><tr><td>Venue</td><td>' . $venue->venue . '</td></tr><tr><td>Booking Date Time</td><td>Start From ' . $request->get('starting_date_time') . ' End To ' . $request->get('ending_date_time') . '</td></tr><tr><td>Price Per Hour</td><td>$' . $venue->price_per_hour . '</td></tr><tr><td>Total Hour</td><td>' . $totalHour . '</td></tr><tr><td>Total Rent</td><td>$' . $totalHour * $venue->price_per_hour . '</td></tr><tr><td>Security Deposit</td><td>$' . $venue->security_deposit_amount . '</td></tr><tr><td>Cleaning Fee</td><td>$' . $venue->cleaning_fee . '</td></tr><tr><td>City Fee</td><td>$' . $venue->city_fee . '</td></tr><tr><td>Total Payable</td><td>$' . $totalPayable . '</td></tr></tbody></table>';
            $mail->Body    = $message;
            $mail->send();

        } catch (Exception $e) {
            return response()->json(['message' => 'Message could not be sent.']);
        }

        return response()->json(['message' => 'Venue Booking Successful', 'customer_booking' => $data]);

    }
}
