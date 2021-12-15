<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $shops = Shop::all();//DBのShopsテーブルをShopModelから取得
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->get();
        //フォームから送られてきた値を取得
        $area_keyword = $request->input('area_word');//エリア検索
        $genre_keyword = $request->input('genre_word');//ジャンル検索
        $name_keyword = $request->input('name_word');//キーワード検索

        //３つの値が空じゃないか判定
    if(!empty($area_keyword) && !empty($genre_keyword) && !empty($name_keyword)){
        //もし空じゃなければDBからLIKEを使ってキーワード検索
        $area = Area::where('name' , $area_keyword)->first();
        $genre = Genre::where('name' , $genre_keyword) ->first();
        $name = Shop::where('name' , 'like' , '%' . $name_keyword . '%')->first();

        $shops = Shop::where('area_id' , $area->id)->where('genre_id' , $genre->id)->where('name' , $name->name)->get();

        return view('guest.index' , compact('likes' , 'shops'));

        //エリアとジャンルのみ検索
    }elseif(!empty($area_keyword) && !empty($genre_keyword) && empty($name_keyword)){
        //もしキーワード検索が空の場合
        $area = Area::where('name' , $area_keyword)->first();
        $genre = Genre::where('name' , $genre_keyword)->first();

        $shops = Shop::where('area_id' , $area->id)->where('genre_id' , $genre->id)->get();

        return view('guest.index' , compact('likes' , 'shops'));

        //エリアとキーワードのみ検索
    }elseif(!empty($area_keyword) && empty($genre_keyword) && !empty($name_keyword)){
        //もしジャンル検索が空の場合
        $area = Area::where('name' , $area_keyword)->first();
        $name = Shop::where('name' , 'like' , '%' . $name_keyword . '%')->first();

        $shops = Shop::where('area_id' , $area->id)->where('name' , $name->name)->get();

        return view('guest.index' , compact('likes' , 'shops'));

    }elseif(empty($area_keyword) && !empty($genre_keyword) && !empty($name_keyword)){
        //もしエリア検索が空の場合
        $genre = Genre::where('name' , $genre_keyword)->first();
        $name = Shop::where('name' , 'like' , '%' . $name_keyword . '%')->first();

        $shops = Shop::where('genre_id' , $genre->id)->where('name' , $name->name)->get();

        return view('guest.index' , compact('likes' , 'shops'));

    }elseif(!empty($area_keyword) && empty($genre_keyword) && empty($name_keyword)){
        //もしエリア検索のみ
        $area = Area::where('name' , $area_keyword)->first();

        $shops = Shop::where('area_id' , $area->id)->get();
        \Debugbar::info($area);

        return view('guest.index' , compact('likes' , 'shops'));

    }elseif(empty($area_keyword) && !empty($genre_keyword) && empty($name_keyword)){
        //ジャンル検索のみ
        $genre = Genre::where('name' , $genre_keyword)->first();

        $shops = Shop::where('genre_id' , $genre->id)->get();

        return view('guest.index', compact('likes' , 'shops'));

    }elseif(empty($area_keyword) && empty($genre_keyword) && !empty($name_keyword)){
        //キーワード検索のみ
        $name = Shop::where('name' , 'like' , '%' . $name_keyword . '%')->first();

        $shops = Shop::where('name' , $name->name)->get();

        return view('guest.index' , compact('likes' ,'shops'));

    }else{
        return view('guest.index' , compact('likes' , 'shops'));
    }
    }

}
