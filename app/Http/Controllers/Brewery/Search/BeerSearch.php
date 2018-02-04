<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 03.02.18
 * Time: 0:47
 */

namespace App\Http\Controllers\Brewery\Search;


use App\Eloquent\Beer;
use Illuminate\Http\Request;

class BeerSearch extends Beer
{
    public $beer;
    private $sortBy = 'asc';
    private $orderBy = 'id';

    public function baseSearch()
    {
        $beer = self::leftJoin('beer_types', 'beer_types.id', '=', 'beers.type_id')
            ->leftJoin('breweries', 'breweries.id', '=', 'beers.brewery_id')
            ->select('beers.*','breweries.name as brewery_name', 'beer_types.name as type_name');
        return $beer;
    }

    public function getBreweries(Request $request)
    {
        $beer = $this->baseSearch();
        if($request->has('type')){
            $beer->where('type_id', $request->type);
        }
        if($request->has('brewery')){
            $beer->where('brewery_id', $request->brewery);
        }
        $beer->orderBy($this->orderBy, $this->sortBy);
        return $beer->paginate(3);
    }
}