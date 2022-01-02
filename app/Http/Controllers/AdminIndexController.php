<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class AdminIndexController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $shop = Shop::where('id', $id)->first();
        $reservations = Reservation::where('shop_id', $shop->id)->with('user')->get();
        return view('admin.home', compact('id', 'shop', 'reservations'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Shop::where('id', $request->id)->update($form);
        return redirect('/admin/:shop_id={id}/home/')->with('flash_message', '編集が完了しました');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
