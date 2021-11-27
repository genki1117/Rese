<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'started_at',
        'number_of_people'
    ];

    protected $casts = [
        'shop_id' => 'int',
        'genre_id' => 'int',
        'area_id' => 'int',
        'number_of_people' =>'int'
    ];


}
