<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    public function index()
    {
        return view('owner.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(Auth::guard('owner')->attempt($credentials)){
            return redirect('/owner/home');
        }else{
            return redirect('/owner/login');
        }
    }

}
