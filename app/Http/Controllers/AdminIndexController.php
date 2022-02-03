<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Admin;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
/**
 * 管理者用のページのコントローラー
 */
class AdminIndexController extends Controller
{
    /**
     * 管理者のトップ
     */
    public function index(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $admin = Admin::where('id', $id)->first();
        $shop = Shop::where('id', $admin->shop_id)->first();
        $reservations = Reservation::where('shop_id', $shop->id)->with('user')->get();
        return view('admin.home', compact('id', 'shop', 'reservations'));
    }
    /**
     * 店舗情報更新
     */
    public function update(Request $request)
    {
        $shop_img_name = $request->file('shop_Img')->getClientOriginalName();
        $path = $request->file('shop_Img')->storeAs('public', $shop_img_name);
        $form = [
            'id' => $request->id,
            'name' => $request->name,
            'comment' => $request->comment,
            'img_path' => 'storage/' . $shop_img_name
        ];

        Shop::where('id', $request->id)->update($form);
        return redirect('/admin/{id}/home/')->with('flash_message', '編集が完了しました');
    }
    /**
     * ログアウト
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
