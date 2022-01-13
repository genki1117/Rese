<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index()
    {
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        return view('emails.index', ['admin' => $admin]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        $inputs = $request->all();
        return view('emails.confirm', ['inputs' => $inputs]);
    }

    public function send(Request $request)
    {
        $mail_text = $request->input('message');
        $mail_title =$request->input('title');
        $users = User::get('email');

        Mail::to($users)->send(new SendMail($mail_text, $mail_title));
    }

    public function complete()
    {
        return view('emails.complete');
    }
}
