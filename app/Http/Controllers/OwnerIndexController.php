<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class OwnerIndexController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('owner.home', compact('shops'));
    }

    public function AdminCreate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',Rules\Password::defaults()],
            'shop_id' => ['required', 'unique:admins,shop_id']
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_id' => $request->shop_id
        ]);

        return redirect('/owner/done');
            // $items = $request;
            // return $items;
    }

    public function CreateDone()
    {
        return view('owner.done');
    }
}
