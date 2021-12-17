<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Genre extends Model
{
    use HasFactory;


    public function shop()
    {
        return $this->hasOne(Shop::class,('genre_id'));
    }

    public static function selectlistGenres()
    {
        $genres = Genre::all();
        $list = array();
        $list += array("" => "Genre");
        foreach($genres as $genre){
            $list += array($genre->id => $genre->name);
        }
        return $list;
    }
}
