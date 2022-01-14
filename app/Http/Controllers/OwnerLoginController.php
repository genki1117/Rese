<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;

class OwnerLoginController extends Controller
{
    /**
     * オーナーログイン表示
     */
    public function index()
    {
        return view('owner.login');
    }
    /**
     * ログイン
     */
    public function login(ClientRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(Auth::guard('owner')->attempt($credentials)){
            return redirect('/owner/home');
        }else{
            return redirect('/owner/login');
        }
    }

}
