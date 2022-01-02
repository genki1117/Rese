<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\User;

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

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dates = ['started_at'];


}
