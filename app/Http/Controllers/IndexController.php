<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shop;

class IndexController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $area_id = Shop::orderBy('created_at','asc');
        $genre_id = Shop::orderBy('create_at','asc');

        return view('guest.index',compact('shops','area_id'));
    }

    public function bind(Shop $shop)
    {
        return view('shop',compact('shop'));
    }

    public function create(Request $request)
    {
        return $request;
    }
}
