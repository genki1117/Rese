<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('guest.login');
    }

    public function checkUser(Request $request)
    {
        // ↓ユーザーの判定
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email,
        'password' => $password])){
            return view('user.mypage');
        }else{
            return redirect('guest/login');
        }
    }
}
