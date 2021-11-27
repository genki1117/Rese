<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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
        $form = $request->all();

        $id = Auth::id();
        $user_id = ['user_id' => $id];

        $id_shop = $request->shop_id;
        $shop_id = ['shop_id' => (int)$id_shop];

        $datetime = $request->date . ' ' . $request->time;
        $started_at = ['started_at' => $datetime];

        $people_number = $request->number_of_people;
        $number_of_people = ['number_of_people' => (int)$people_number];

        $content = $user_id + $shop_id + $started_at + $number_of_people;
        Reservation::create($content);
        // $datas = Reservation::all();
        return redirect('/done');
        // var_dump($content);
    }

    public function done()
    {
        return view('done');
    }
}
