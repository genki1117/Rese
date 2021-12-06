<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'img_path',
        'area_id',
        'genre_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class,('shop_id'));
    }

    public function likes()
    {
        return $this->belongsTo(Like::class,('shop_id'));
    }
}
