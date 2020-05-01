<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendVerificationCodeRequest;
use App\Model\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class VerificationController extends Controller
{
    public function sendVerificationCode(SendVerificationCodeRequest $request)
    {
        $customer = Customer::where('login_id', $request->get('login_id'))->first();
        if (empty($customer)) {
            return response()->json(['message' => 'No Account Found for ' . $request->get('login_id') . '!']);
        } else {

            $verificationCode = strtoupper(Str::random(6));
            $mail = new PHPMailer(true);

            try {

                $mail->SMTPDebug = 1;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "http://hornsbybahais.org.au";
                $mail->Port = 587;

                $mail->setFrom('hbcl@hornsbybahais.org.au', 'Hornsby Bahá’í Centre of Learning');
                $mail->addAddress($customer->email);



                $mail->isHTML(true);
                $mail->Subject = 'Verification Code';

                $message = '<h2>Hello ' . $customer->name . '</h2>';
                $message .= '<p>Your Password Reset Verification Code is <b>' . $verificationCode . '</b></p>';
                $mail->Body    = $message;


                $mail->send();

                Customer::where('login_id', $request->get('login_id'))->update(['verification_code' => $verificationCode]);
                return response()->json(['message' => 'Verification Code Sent Successfully', 'customer' => $customer]);

            } catch (Exception $e) {
                return response()->json(['message' => 'Message could not be Sent!']);
            }


        }


    }

    public function verifyVerificationCode(Request $request)
    {
        $request->validate([
            'verification_code' => [
                'required',
                'max:6',
                'min:6'
            ],
            'login_id' => [
                'required',
            ]
        ]);

        $customer = Customer::where('login_id', $request->get('login_id'))->where('verification_code', $request->get('verification_code'))->first();

        if ( ! empty($customer)) {
            return response()->json(['message' => 'Verification Code Verified Successfully', 'customer' => $customer]);
        } else {
            return response()->json(['message' => 'Invalid Verification Code Found!']);
        }

    }
}
