<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReservationRequest;


class IndexController extends Controller
{
    public function index()//一覧ページ取得
    {
        $shops = Shop::with(['likes' => function($query){
            $query->where('user_id' , Auth::id());
        }])->get();
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        $area_id ='';
        $genre_id = '';
        return view('index' , compact('shops' , 'user' , 'areas' , 'genres' , 'area_id' , 'genre_id'));
    }

    public function bind(Shop $shop)
    {
        $user = Auth::user();//Authからログインユーザーの情報を取得
        $shop_id = $shop->id;
        $reservations = Reservation::where('shop_id',$shop_id)->get();
        $reviews = Review::where('shop_id' , $shop->id)->get();

        return view('shop',compact('shop','reservations' , 'reviews'));
    }
    public function create(ReservationRequest $request)//予約追加
    {
        $form = $request->all();

        $user_id = Auth::id();//user_id取得
        $shop_id = $request->shop_id;//shop_idを取得
        $start_at = $request->date . ' ' . $request->time;//日時と時間をDBの書式に整形しつつ取得
        $number_of_people = $request->number;//nmber_of_peopleを取得

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

    public function search(Request $request)
    {

        $areas = Area::all();
        $genres = Genre::all();
        $user = Auth::user();
        $area_id = $request->input('area_id');//エリアをbaldeのinputから取得
        $genre_id = $request->input('genre_id');//ジャンルをbaldeのinputから取得
        $name = $request->input('name');//ワードをbaldeのinputから取得
        $query = Shop::query();//queryメソッド

        if(!empty($area_id)){
            $query->where('area_id' , $area_id);//エリア検索
        }
        if(!empty($genre_id)){
            $query->where('genre_id' , $genre_id);//ジャンル検索
        }
        if(!empty($name)){
            $query->where('name' , 'LIKE' , '%' . $name . '%');//ワード検索
        }

        $shops = $query->get();


        return view('index' , compact('shops' , 'area_id' , 'genre_id' , 'name' , 'areas' , 'genres' , 'user'));
    }

}
