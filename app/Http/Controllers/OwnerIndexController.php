<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\AdminCreateRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Reservation;
use App\Models\User;

class OwnerIndexController extends Controller
{
    /**
     * オーナー画面表示
     */
    public function index()
    {
        $shops = Shop::all();
        $users = User::all();
        $today_reservation = Reservation::wheredate('started_at', '2022-01-20')->with('user')->first();
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
