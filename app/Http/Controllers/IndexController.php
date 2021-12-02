<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index()//一覧ページ取得
    {

        $shops = Shop::all();//DBのShopsテーブルをShopModelから取得
        $area_id = Shop::orderBy('created_at','asc')->first();
        $genre_id = Shop::orderBy('create_at','asc');
        // $shop_id = Shop::find('ID');//ショップのIDを取得する！！！
        // var_dump($shop_id,$user);
        // $user_id = Like::where('user_id' , auth()->user()->id)->first();
        // $shop_id = Like::where('$shop_id', auth()->user()->id)->first();
        // $likes = Like::where('user_id', $user->id)->where('shop_id', $shops->id)->first();
        // $likes = Like::where('user_id', $user->id)->where('shop_id', $shop_id)->first();

        $shop_id = DB::table('shops')->where('id')->get();
        var_dump($shop_id->id);
        // $likes = Like::where('user_id', auth()->user()->id)->where('shop_id' , $shop_id)->first();

        // $likes = Like::where('user_id', auth()->user()->id)->first();
        // where('shop_id' , $shop_id)->first();
        var_dump($likes);

        return view('guest.index',compact('shops','likes'));
    }

    public function bind(Shop $shop)
    {
        $user = Auth::user();//Authからログインユーザーの情報を取得
        // var_dump($user);
        // var_dump($shop);
        $shop_Id = $shop->id;
        $reservations = Reservation::where('shop_id',$shop_Id)->get();
        return view('shop',compact('shop','reservations'));
    }

    public function create(Request $request)//予約追加
    {
        $form = $request->all();

        $id = Auth::id();//user_id取得
        $user_id = ['user_id' => $id];//連想配列に整形

        $id_shop = $request->shop_id;//shop_idを取得
        $shop_id = ['shop_id' => (int)$id_shop];//shop_id=>intの連想配列に整形

        $datetime = $request->date . ' ' . $request->time;//日時と時間をDBの書式に整形しつつ取得
        $started_at = ['started_at' => $datetime];//連想配列に整形

        $people_number = $request->number_of_people;//nmber_of_peopleを取得
        $number_of_people = ['number_of_people' => (int)$people_number];//連想配列にintで整形

        $content = $user_id + $shop_id + $started_at + $number_of_people;
        Reservation::create($content);//reservationテーブルにcreateで送信
        return redirect('/done');//送信後のリダイレクト
    }

    public function done()//予約完了ページ表示
    {
        return view('done');
    }
}
