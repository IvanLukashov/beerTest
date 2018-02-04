<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beer extends Model
{
    protected $table = 'beers';
    public $fillable = [
        'name',
        'description',
        'type_id',
        'brewery_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Eloquent\BeerType');
    }
    public function brewery()
    {
        return $this->belongsTo('App\Eloquent\Brewery');
    }
}
