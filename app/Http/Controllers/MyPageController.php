<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Shop;

class MyPageController extends Controller
{
    public function store()
    {
        $user = Auth::user();//user情報取得
        $user_Id = Auth::id();//userのIDのみ取得
        $reservations = Reservation::where('user_id',$user_Id)->get();;
        //ReservationModelから情報を取得、where句の第一引数でreservationsテーブルの'user_id'を指定。
        //第二引数で取得したIDを指定しget
        $likes = Like::all();
        $shop = Shop::all();

        return view('user.mypage',compact('user','reservations','likes' , 'shop'));
    }

    public function destroy(Request $request)
    {
        //ログアウト
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function delete(Request $request)
    {
        //予約取り消し
        Reservation::find($request->id)->delete();
        return redirect('/mypage');
    }
}
