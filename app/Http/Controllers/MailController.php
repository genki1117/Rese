<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('emails.index');
    }

    public function confirm()
    {
        return view('emails.confirm');
    }

    public function send()
    {
        $to = [
            [
                'email' => 'komekome@gmail.com',
                'name' => 'sudo',
            ]
        ];
        Mail::to($to)->send(new SendMail());
    }

    public function complete()
    {
        return view('emails.complete');
    }
}
