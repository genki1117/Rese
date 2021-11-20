<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientRequest;


class RegisterController extends Controller
{
    public function index()
    {
        return view('guest.register');
    }

    public function add()
    {
        return view('guest.thanks');
    }

    public function create(ClientRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
