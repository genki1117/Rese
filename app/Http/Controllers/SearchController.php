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
        $area_keyword = $request->input('area_word');
        $genre_keyword = $request->input('genre_word');
        $name_keyword = $request->input('name_word');

        //３つの値が空じゃないか判定
    if(!empty($area_keyword) && !empty($genre_keyword) && !empty($name_keyword)){

        //もし空じゃなければDBからLIKEを使ってキーワード検索
        $area = Area::where('name' , 'like' , '%' . $area_keyword . '%')->first();
        $genre = Genre::where('name' , 'like' , '%' . $genre_keyword . '%') ->first();
        $name = Shop::where('name' , 'like' , '%' . $name_keyword . '%')->first();

        $shops = Shop::where('area_id' , $area->id)->where('genre_id' , $genre->id)->where('name' , $name->name)->get();
        \Debugbar::info(Shop::find($shops));

        return view('guest.index' , compact('likes' , 'shops'));
    }
    }
}
