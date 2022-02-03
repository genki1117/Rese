<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ClientRequest;

class LoginController extends Controller
{
    /**
     * ユーザーログインページ表示
     */
    public function index(Request $request)
    {
        return view('login');
    }
    /**
     * ログイン認証
     */
    public function checkUser(ClientRequest $request)
    {
        // ユーザーの判定
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email,
            'password' => $password])){
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
}
