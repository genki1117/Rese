<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Genre;
use App\Modesl\Like;
use App\Models\Reservation;

class Shop extends Model
{
    protected $fillable = [

    ];

    public function area()
    {
        return $this->belongsTo(Area::class,('area_id'));
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class,('genre_id'));
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class,'shop_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'shop_id');
    }
}
