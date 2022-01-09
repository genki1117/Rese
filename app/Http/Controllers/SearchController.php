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
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $name = $request->input('name');

        $query = Shop::query();

        if(!empty($area_id)){
            $query->where('area_id' , $area_id);
        }
        if(!empty($genre_id)){
            $query->where('genre_id' , $genre_id);
        }
        if(!empty($name)){
            $query->where('name' , 'LIKE' , '%' . $name . '%');
        }

        $shops = $query->get();


        return view('index' , compact('shops' , 'area_id' , 'genre_id' , 'name' , 'areas' , 'genres' , 'user'));
    }

}
