<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;


class AdminLoginController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('admin.login', compact('shops'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password', 'shop_id']);
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect('/admin/{id}/home');
        }else{
            return redirect('/admin/login');
        }
    }
}
