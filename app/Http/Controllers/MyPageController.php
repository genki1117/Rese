<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Shop;


class MyPageController extends Controller
{
    /**
     * マイページ表示
     */
    public function store()
    {
        $user = Auth::user();//user情報取得
        $user_Id = Auth::id();//userのIDのみ取得
        $reservations = Reservation::where('user_id',$user_Id)->get();
        //ReservationModelから情報を取得、where句の第一引数でreservationsテーブルの'user_id'を指定。
        //第二引数で取得したIDを指定しget
        $likes = Like::where('user_id', $user_Id)->get();
        $shop = Shop::all();
        return view('mypage',compact('user','reservations','likes' , 'shop'));
    }
    /**
     * ログアウト
     */
    public function destroy(Request $request)
    {
        //ログアウト
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    /**
     * 予約削除
     */
    public function delete(Request $request)
    {
        //予約取り消し
        Reservation::find($request->id)->delete();
        return redirect('/mypage');
    }
    /**
     * 予約更新
     */
    public function update(Request $request)
    {
        $form = $request->all();
        $forms = [
            "id" => $request->id,
            "started_at" => $request->date . ' ' . $request->time,
            "number_of_people" => $request->number_of_people
        ];
        unset($forms['_token']);
        Reservation::where('id' , $request->id)->update($forms);
        return redirect('/mypage');
    }
}
