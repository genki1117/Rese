<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('guest.login');
    }

    public function checkUser(Request $request)
    {
        //バリデーション
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required']
        ]);

        // ユーザーの判定
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email,
            'password' => $password])){
            return redirect('/mypage');
        }else{
            return view('/login');
        }
    }
}
