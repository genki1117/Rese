<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Area extends Model
{

    protected $fillable = [
        'name'
    ];

    public function shop()
    {
        return $this->hasOne('App\Modesl\Shop');
    }
    public static function selectlistAreas()
    {
        $areas = Area::all();
        $list = array();
        $list += array("" => "Area");
        foreach($areas as $area){
            $list += array( $area->id => $area->name );
        }
        return $list;
    }
}
