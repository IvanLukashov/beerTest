<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeerType extends Model
{

    public $fillable = [
        'name'
    ];

    public static function getMap()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->all();
    }
}
