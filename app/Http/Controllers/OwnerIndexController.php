<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\AdminCreateRequest;
use Illuminate\Support\Facades\Auth;

class OwnerIndexController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('owner.home', compact('shops'));
    }

    public function AdminCreate(AdminCreateRequest $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_id' => $request->shop_id
        ]);

        return redirect('/owner/done');
    }

    public function CreateDone()
    {
        return view('owner.done');
    }

    public function logout(Request $request)
    {
        Auth::guard('owner')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/owner/login');
    }
}
