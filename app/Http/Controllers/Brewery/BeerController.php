<?php

namespace App\Http\Controllers\Brewery;

use App\Eloquent\BeerType;
use App\Eloquent\Brewery;
use App\Http\Controllers\Brewery\Search\BeerSearch;
use App\Http\Requests\BeerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeerController extends Controller
{
    public $beer;


    public function __construct(BeerSearch $beer)
    {
        $this->beer = $beer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $beer = $this->beer->with('type')->with('brewery')->get();
        $beer = $this->beer->getBreweries($request);
        $beer_types = BeerType::getMap();
        $breweries = Brewery::getMap();
        return view('beer.index')->with(compact('beer', 'beer_types', 'breweries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beer = $this->beer;
        $beer_types = BeerType::getMap();
        $breweries = Brewery::getMap();
        return view('beer.create')->with(compact('beer', 'beer_types', 'breweries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeerRequest $request)
    {
        try{
            $this->beer->create($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.beer_error'))->withInput();
        }

        return redirect()
            ->route('beers.index')
            ->with('message_success',  __('controllers.beer_create'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beer = $this->beer->find($id);
        $beer_types = BeerType::getMap();
        $breweries = Brewery::getMap();
        return view('beer.edit')->with(compact('beer', 'beer_types', 'breweries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeerRequest $request, $id)
    {
        $update_beer = $this->beer->find($id);
        try{
            $update_beer->update($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.beer_error'))->withInput();
        }
        return redirect()
            ->route('beers.index')
            ->with('message_success', __('controllers.beer_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->beer->find($id)->delete();
        return redirect()
            ->route('beers.index')
            ->with('message_success', __('controllers.beer_destroy'));
    }
}
