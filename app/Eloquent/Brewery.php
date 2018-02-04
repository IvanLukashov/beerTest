<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brewery extends Model
{
    protected $table = 'breweries';

    public $fillable = [
        'name',
        'description'
    ];

    public static function getMap()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->all();
    }
}
