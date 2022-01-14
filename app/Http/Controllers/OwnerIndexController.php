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
    /**
     * オーナー画面表示
     */
    public function index()
    {
        $shops = Shop::all();
        return view('owner.home', compact('shops'));
    }
    /**
     * admin登録
     */
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
    /**
     * 登録完了ページ
     */
    public function CreateDone()
    {
        return view('owner.done');
    }
    /**
     * ログアウト
     */
    public function logout(Request $request)
    {
        Auth::guard('owner')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/owner/login');
    }
}
