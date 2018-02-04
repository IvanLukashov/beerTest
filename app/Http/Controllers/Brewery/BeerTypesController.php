<?php

namespace App\Http\Controllers\Brewery;

use App\Eloquent\BeerType;
use App\Http\Requests\BeerTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeerTypesController extends Controller
{
    public $beer_type;


    public function __construct(BeerType $beer_type)
    {
        $this->beer_type = $beer_type;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->beer_type->paginate(3);
        return view('beer_type.index')->with(compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $this->beer_type;
        return view('beer_type.create')->with(compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeerTypeRequest $request)
    {
        try{
            $this->beer_type->create($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.beer_type_error'))->withInput();
        }

        return redirect()
            ->route('beer_type.index')
            ->with('message_success',  __('controllers.beer_type_create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->beer_type->find($id);
        return view('beer_type.edit')->with(compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\beer_typeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeerTypeRequest $request, $id)
    {
        $update_beer_type = $this->beer_type->find($id);
        try{
            $update_beer_type->update($request->except('_token'));
        }catch (\Exception $e){
            return redirect()->back()->with('message_error', __('controllers.beer_type_error'))->withInput();
        }
        return redirect()
            ->route('beer_type.index')
            ->with('message_success', __('controllers.beer_type_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->beer_type->find($id)->delete();
        return redirect()
            ->route('beer_type.index')
            ->with('message_success', __('controllers.beer_type_destroy'));
    }
}
