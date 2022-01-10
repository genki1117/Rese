<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index()
    {
        // $id = Admin::find('id');
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

        Contact::create([
            'shop_id' => $request->shop_id,
            'title' => $request->title,
            'message' => $request->message,
        ]);

        $inputs = $request->all();

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
