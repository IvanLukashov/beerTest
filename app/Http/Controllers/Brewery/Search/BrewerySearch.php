<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 03.02.18
 * Time: 0:47
 */

namespace App\Http\Controllers\Brewery\Search;


use App\Eloquent\Brewery;
use Illuminate\Http\Request;

class BrewerySearch extends Brewery
{
    public $brewery;
    private $sortBy = 'asc';
    private $orderBy = 'id';

    public function baseSearch()
    {
        $brewries = self::distinct()->leftJoin('beers', 'breweries.id', '=', 'beers.brewery_id')
            ->select('breweries.*');
        return $brewries;
    }

    public function getBreweries(Request $request)
    {
        $breweries = $this->baseSearch();
        if($request->has('type')){
            $breweries->where('type_id', $request->type);
        }
        $breweries->orderBy($this->orderBy, $this->sortBy);
        return $breweries->paginate(3);
    }
}