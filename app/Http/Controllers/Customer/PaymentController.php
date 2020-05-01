<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Admin\Configuration\Venue;
use App\Model\Customer;
use App\Model\Customer\CustomerBooking;


use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use phpDocumentor\Reflection\DocBlock\Tags\See;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class PaymentController extends Controller
{

    public function paymentCreate()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Aa6Aya7GBJ9r9NN8OrUPz1cqAkzoY-KfETGFj4pNBfIoqkodackNAyexFkUIavYDZ6UWiiLAH15vZ1e4',     // ClientID
                'EOWkZYdib4OBAknRgFQqx_7bVXq_XAJDVbqmpcXZK6XunlsMLrWb6yosAWvDwEI6t678kHh45ctlMf9S'      // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => 'live',
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $sessionVenue = Session::get('venue');
        $venue = Venue::where('id', $sessionVenue[0]['venue_id'])->first();
        $totalHour = (strtotime($sessionVenue[0]['ending_date_time']) - strtotime($sessionVenue[0]['starting_date_time']))/(60*60);
        $venueRent = $totalHour * $venue->price_per_hour;
        $subtotal = $venueRent + $venue->security_deposit_amount + $venue->cleaning_fee + $venue->city_fee;
        $tax = 0;
        $total = $subtotal + $tax;
        $item1 = new Item();
        $item1->setName($venue->venue)
            ->setCurrency('AUD')
            ->setQuantity(1)
            ->setSku($venue->number) // Similar to `item_number` in Classic API
            ->setPrice($subtotal);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));
        $details = new Details();
        $details
            ->setTax($tax)
            ->setSubtotal($subtotal);

        $amount = new Amount();
        $amount->setCurrency("AUD")
            ->setTotal($total)
            ->setDetails($details);

        $invoiceNumber = strtoupper(uniqid());

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber($invoiceNumber);


        Session::forget('invoice_number');
        Session::push('invoice_number', $invoiceNumber);


        $baseUrl = url('/');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl . "/customer/payment/execute")
            ->setCancelUrl($baseUrl . "/customer/payment/cancel");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $payment->create($apiContext);

        return redirect($payment->getApprovalLink());
    }

    public function paymentExecute()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Aa6Aya7GBJ9r9NN8OrUPz1cqAkzoY-KfETGFj4pNBfIoqkodackNAyexFkUIavYDZ6UWiiLAH15vZ1e4',     // ClientID
                'EOWkZYdib4OBAknRgFQqx_7bVXq_XAJDVbqmpcXZK6XunlsMLrWb6yosAWvDwEI6t678kHh45ctlMf9S'      // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => 'live',
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $sessionVenue = Session::get('venue');
        $venue = Venue::where('id', $sessionVenue[0]['venue_id'])->first();
        $totalHour = (strtotime($sessionVenue[0]['ending_date_time']) - strtotime($sessionVenue[0]['starting_date_time']))/(60*60);
        $venueRent = $totalHour * $venue->price_per_hour;
        $subtotal = $venueRent + $venue->security_deposit_amount + $venue->cleaning_fee + $venue->city_fee;
        $tax = 0;

        $total = $subtotal + $tax;

        $details->setTax($tax)
            ->setSubtotal($subtotal);

        $amount->setCurrency('AUD');
        $amount->setTotal($total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);

        $invoiceNumber = session('invoice_number')[0];

        $data = new CustomerBooking();
        $data->invoice_number = $invoiceNumber;
        $data->customer_id = session('session_id');
        $data->venue_id = $venue->id;
        $data->price_per_hour = $venue->price_per_hour;
        $data->total_hour = $totalHour;
        $data->cleaning_fee = $venue->cleaning_fee;
        $data->city_fee = $venue->city_fee;
        $data->security_deposit_amount = $venue->security_deposit_amount;
        $data->security_deposit_status = 'Paid';
        $data->arrival_date_time = $sessionVenue[0]['arrival_date_time'];
        $data->starting_date_time = $sessionVenue[0]['starting_date_time'];
        $data->ending_date_time = $sessionVenue[0]['ending_date_time'];
        $data->number_of_children = $sessionVenue[0]['number_of_children'];
        $data->number_of_adult = $sessionVenue[0]['number_of_adult'];
        $data->result = $result;
        $data->status = 'Reserved';
        $data->narrative = '---';
        $data->created_by = session('session_id');
        $data->save();

        Session::forget('venue');
        Session::forget('invoice_number');

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
            $totalPayable = ($totalHour * $venue->price_per_hour) + $venue->cleaning_fee + $venue->city_fee + $venue->security_deposit_amount;
            $message = '<h2>Your booking has been confirmed with the following information.</h2>';
            $message .= '<table><tbody><tr><td>Venue</td><td>' . $venue->venue . '</td></tr><tr><td>Booking Date Time</td><td>Start From ' . $sessionVenue[0]['starting_date_time'] . ' End To ' . $sessionVenue[0]['ending_date_time'] . '</td></tr><tr><td>Price Per Hour</td><td>$' . $venue->price_per_hour . '</td></tr><tr><td>Total Hour</td><td>' . $totalHour . '</td></tr><tr><td>Total Rent</td><td>$' . $totalHour * $venue->price_per_hour . '</td></tr><tr><td>Security Deposit</td><td>$' . $venue->security_deposit_amount . '</td></tr><tr><td>Cleaning Fee</td><td>$' . $venue->cleaning_fee . '</td></tr><tr><td>City Fee</td><td>$' . $venue->city_fee . '</td></tr><tr><td>Total Payable</td><td>$' . $totalPayable . '</td></tr></tbody></table>';

            $customer = Customer::where('id', session('session_id'))->first();

            $pdf = PDF::loadView('Customer.invoice_pdf', compact('invoiceNumber', 'venue', 'totalHour', 'customer'));
            Storage::disk('public')->put('customer/invoice/' . $invoiceNumber . '_invoice.pdf', $pdf->output());

            $mail->addAttachment(storage_path('app/public/customer/invoice/' . $invoiceNumber . '_invoice.pdf'));
            $mail->Body = $message;
            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return redirect('customer/booking/confirmation/' . $data->id);
    }

    public function paymentCancel()
    {
        Session::forget('venue');
        Session::forget('invoice_number');
        return redirect('customer/booking');
    }
}
