<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Routing\Redirector;
use App\Http\Requests\OwnerRegisterRequest;

class OwnerRegisterController extends Controller
{
    /**
     * オーナー登録画面表示
     */
    public function index()
    {
        return view('owner.register');
    }
    /**
     * オーナー登録
     */
    public function create(OwnerRegisterRequest $request)
    {
        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('owner.home');
    }

}
