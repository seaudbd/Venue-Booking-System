<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Model\Customer;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class RegistrationController extends Controller
{
    public function index()
    {
        $title = 'Registration | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Registration';
        $page = '';
        return view('registration', compact('title', 'activeNav', 'page'));
    }

    public function register(RegistrationRequest $request)
    {
        $number = Customer::max('number');
        if (!empty($number)) {
            $number = $number + 1;
        } else {
            $number = 100001;
        }
        $customer = Customer::create([
            'number' => $number,
            'name' => $request->get('name'),
            'company_name' => $request->get('company_name'),
            'contact_number' => $request->get('contact_number'),
            'address' => $request->get('address'),
            'login_id' => $request->get('login_id'),
            'password' => sha1($request->get('password')),
            'email' => $request->get('login_id'),
            'verification_code' => '---',
            'access_code' => '---',
            'photo' => '---',
            'status' => 'Casual',
            'narrative' => '---',
            'created_by' => 0,
        ]);

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "http://hornsbybahais.org.au";
            $mail->Port = 587;

            $mail->setFrom('hbcl@hornsbybahais.org.au', 'Hornsby Bahá’í Centre of Learning');
            $mail->addAddress($request->get('login_id'));



            $mail->isHTML(true);
            $mail->Subject = 'Congratulations!';

            $message = '<h2>Hello ' . $request->get('name') . '</h2>';
            $message .= '<h5>Your Account has been created successfully.</h5>';
            $mail->Body    = $message;


            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent.";
        }

        session([
            'login_status' => true,
            'session_id' => $customer->id,
            'login_id' => $customer->login_id,
            'name' => $customer->name,
            'photo' => $customer->photo,
            'user_status' => $customer->status
        ]);
        return response()->json('Authorized Access');

    }
}
