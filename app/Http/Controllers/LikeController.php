<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function like(Shop $shop,Request $request)
    {
        $like = New like();
        $like->shop_id = $shop->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }

    public function unlike(Shop $shop,Request $request)
    {
        $user = Auth::user()->id;
        $like = Like::where('shop_id',$shop->id)->where('user_id',$user)->first();
        $like->delete();
        return back();
    }
}
