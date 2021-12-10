<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\genre;
use App\Models\area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index()//一覧ページ取得
    {
        // $shops = Shop::with('likes')->get();//DBのShopsテーブルをShopModelから取得
        // $user = Auth::user();
        // // \Debugbar::info($shops);
        // $likes = Like::where('user_id', $user->id)->where('shop_id' , )->get();
        // return view('guest.index')->with(compact('shops' , 'likes'));

        $shops = Shop::all();//DBのShopsテーブルをShopModelから取得
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->get();

        return view('guest.index',compact('shops','likes'));

    }

    public function bind(Shop $shop)
    {
        $user = Auth::user();//Authからログインユーザーの情報を取得
        $shop_id = $shop->id;
        $reservations = Reservation::where('shop_id',$shop_id)->get();
        return view('shop',compact('shop','reservations'));
    }
    public function create(Request $request)//予約追加
    {
        $form = $request->all();

        $user_id = Auth::id();//user_id取得
        $shop_id = $request->shop_id;//shop_idを取得
        $start_at = $request->date . ' ' . $request->time;//日時と時間をDBの書式に整形しつつ取得
        $number_of_people = $request->number_of_people;//nmber_of_peopleを取得

        $content = [
            'user_id' => $user_id,
            'shop_id' => (int)$shop_id,
            'started_at' => $start_at,
            'number_of_people' => (int)$number_of_people
        ];
        Reservation::create($content);//reservationテーブルにcreateで送信
        return redirect('/done');//送信後のリダイレクト
    }

    public function done()//予約完了ページ表示
    {
        return view('done');
    }

}
