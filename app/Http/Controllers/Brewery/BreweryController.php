<?php

namespace App\Http\Controllers\Brewery;

use App\Eloquent\BeerType;
use App\Http\Controllers\Brewery\Search\BrewerySearch;
use App\Http\Requests\BreweryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BreweryController extends Controller
{
    public $brewery;


    public function __construct(BrewerySearch $brewery)
    {
        $this->brewery = $brewery;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brewery = $this->brewery->getBreweries($request);
        $beer_types = BeerType::getMap();
        return view('brewery.index')->with(compact('brewery', 'beer_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brewery = $this->brewery;
        return view('brewery.create')->with(compact('brewery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreweryRequest $request)
    {
        try{
            $this->brewery->create($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.brewery_error'))->withInput();
        }

        return redirect()
            ->route('brewery.index')
            ->with('message_success',  __('controllers.brewery_create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brewery = $this->brewery->find($id);
        return view('brewery.edit')->with(compact('brewery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BreweryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BreweryRequest $request, $id)
    {
        $update_brewery = $this->brewery->find($id);
        try{
            $update_brewery->update($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.brewery_error'))->withInput();
        }
        return redirect()
            ->route('brewery.index')
            ->with('message_success', __('controllers.brewery_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brewery->find($id)->delete();
        return redirect()
            ->route('brewery.index')
            ->with('message_success', __('controllers.brewery_destroy'));
    }
}
