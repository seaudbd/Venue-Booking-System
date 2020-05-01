<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Model\Contact;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function index($page)
    {
        $title = $page . ' | Hornsby Baha’i Centre of Learning';
        $activeNav = '';
        return view('contact', compact('title', 'page', 'activeNav'));
    }

    public function save(ContactRequest $request)
    {
        $data = new Contact();
        $data->name = $request->get('name');
        $data->company_name = $request->get('company_name');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        $data->interested_in = $request->get('interested_in');
        $data->message = $request->get('message');
        $data->save();

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "http://hornsbybahais.org.au";
            $mail->Port = 587;
            $mail->setFrom('hbcl@hornsbybahais.org.au', 'Hornsby Bahá’í Centre of Learning');
            $mail->addAddress('hbcl@hornsbybahais.org.au');
            $mail->isHTML(true);
            $mail->Subject = 'Assembly Booking Request!';
            $message = '<table><tbody><tr><td>Full Name</td><td>' . $request->get('name') . '</td></tr><tr><td>Company Name</td><td>' . $request->get('company_name') . '</td></tr><tr><td>Phone</td><td>' . $request->get('phone') . '</td></tr><tr><td>Email</td><td>' . $request->get('email') . '</td></tr><tr><td>Interested In</td><td>' . $request->get('interested_in') . '</td></tr><tr><td>Message</td><td>' . $request->get('message') . '</td></tr></tbody></table>';
            $mail->Body    = $message;
            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return response()->json('Contact Data Saved Successfully');
    }
}
