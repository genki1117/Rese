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
use App\Http\Requests\MailSendRequest;

class MailController extends Controller
{
    /**
     * メール作成ページ表示
     */
    public function index()
    {
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        return view('emails.index', ['admin' => $admin]);
    }
    /**
     * メール確認ページ表示
     */
    public function confirm(MailSendRequest $request)
    {

        $inputs = $request->all();
        return view('emails.confirm', ['inputs' => $inputs]);
    }
    /**
     * メール送信
     * DB登録
     */
    public function send(Request $request)
    {
        $mail_text = $request->input('message');
        $mail_title =$request->input('title');
        $users = User::get('email');
        $contacts = new Contact;
        $contacts->shop_id = $request->shop_id;
        $contacts->title = $request->title;
        $contacts->message = $request->message;
        $contacts -> save();
        Mail::to($users)->send(new SendMail($mail_text, $mail_title));
        return redirect('/admin/mailcontact/complete');
    }
    /**
     * 完了ページ表示
     */
    public function complete()
    {
        return view('emails.complete');
    }
}
