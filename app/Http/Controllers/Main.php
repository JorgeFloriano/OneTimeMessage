<?php

namespace App\Http\Controllers;

use App\Mail\email_confirm_message;
use App\Mail\email_message_readed;
use App\Mail\email_read_message;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Main extends Controller
{
    //------------------------------------------
    public function index() {
        return view('message_form');
    }

    //------------------------------------------
    public function init(Request $request) {
        
        // check if there was a post
        if (!$request->isMethod('post')) {
            return redirect()->route('main_index');
        }

        // validation
        $request->validate(
            [
                'txtFrom' => 'required|email|max:50',
                'txtTo' => 'required|email|max:50',
                'txtMessage' => 'required|max:250'
            ],
            [
                'txtFrom.required' => 'From is required',
                'txtFrom.email' => 'From must be a valid email',
                'txtFrom.max' => 'From must have less than 50 chars',
                'txtTo.required' => 'To is required',
                'txtTo.email' => 'To must be a valid email',
                'txtTo.max' => 'To must have less than 50 chars',
                'txtMessage.required' => 'Message is required',
                'txtMessage.max' => 'Message must have less than 250 chars',
            ]
        );

        // Create hash code (purl code)
        $purl_code = Str::random(32);

        $message = new Message();
        $message->send_from = $request->txtFrom;
        $message->send_to = $request->txtTo;
        $message->message = $request->txtMessage;
        $message->purl_confirmation = $purl_code;
        $message->save();

        // Send email to confirm message
        Mail::to($request->txtFrom)->send(new email_confirm_message($purl_code));

        // Update the database with the date and time the confirmation email was sent
        $message = Message::where('purl_confirmation', $purl_code)->first();
        $message->purl_confirmation_sent = now();
        $message->save();

        // Display the view indicating that the confirmation email was sent
        $data = [
            'email_adress' => $request->txtFrom
        ];
        return view('email_confirmation_sent', $data);
    }

    //------------------------------------------
    public function confirm($purl) {
        
        // check if purl exists
        if (empty($purl)) {
            return redirect()->route('main_index');
        }

        // check if purl exists in database
        $message = Message::where('purl_confirmation', $purl)->first();

        // check is there is a message
        if ($message === null) {

        // Presents a view indicating that there was an error
        return view('error');
        }

        // Get the recipient email addres
        $email_to = $message->send_to;

        // remove purl_confirmation and creates purl_read
        $purl_read = Str::random(32);
        $message->purl_confirmation = null;
        $message->purl_read = $purl_read;
        $message->purl_read_sent = now();
        $message->save();

        // Send email to the recipient
        Mail::to($email_to)->send(new email_read_message($purl_read));

        // Display the preview indicating that the message was sent successfully
        $data = [
            'email_adress' => $email_to
        ];
        return view('message_sent', $data);

    }

    //------------------------------------------
    public function read($purl) {

        // check if purl exists
        if (empty($purl)) {
            return redirect()->route('main_index');
        }

        // check if purl exists in database
        $message = Message::where('purl_read', $purl)->first();

        // check is there is a message
        if ($message === null) {

            // Presents a view indicating that there was an error
        return view('error');
        }

        // Remove purl_read and store message_readed
        $message_readed = now();
        $email_recipient = $message->send_to;
        $email_from = $message->send_from;

        $message->purl_read = null;
        $message->message_readed = $message_readed;
        $message->save();

        // Send email to the emitter confirming that the message was readed
        Mail::to($email_from)->send(new email_message_readed($message_readed, $email_recipient));

        // Display the one time message
        $data = [
            'message' => $message->message,
            'sender' => $message->send_from
        ];
        return view('read_message', $data);
    }
}