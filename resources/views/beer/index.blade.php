@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(session('message_success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('message_success') }}
                    </div>
                @endif
                <div class="card card-plain">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Beers</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('beers.create') }}" class="btn btn-primary">Create New</a>
                            </div>
                            <div class="col-md-2">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <i class="material-icons">bubble_chart</i>
                                            <span class="notification">Filter by beer type  <b>{{ Request::input('type') ? $beer_types[Request::input('type')] : '' }}</b></span>
                                            <p class="hidden-lg hidden-md">Notifications</p>
                                            <div class="ripple-container"></div></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ action('Brewery\BeerController@index', Request::except('type')) }}">All</a>
                                            </li>
                                            @forelse($beer_types as $id => $type)
                                                <li>
                                                    <a href="{{ action('Brewery\BeerController@index', array_merge(['type' => $id], Request::except('type'))) }}">{{ $type }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul class="nav navbar-nav navbar-left">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <i class="material-icons">bubble_chart</i>
                                            <span class="notification">Filter by beer brewery <b>{{ Request::input('brewery') ? $breweries[Request::input('brewery')] : '' }}</b></span>
                                            <p class="hidden-lg hidden-md">Notifications</p>
                                            <div class="ripple-container"></div></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ action('Brewery\BeerController@index', Request::except('brewery')) }}">All Breweries</a>
                                            </li>
                                            @forelse($breweries as $id => $brewery)
                                                <li>
                                                    <a href="{{ action('Brewery\BeerController@index', array_merge(['brewery' => $id],Request::except('brewery'))) }}">{{ $brewery }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Brewery</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @forelse($beer as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! str_limit($item->description, 60) !!}</td>
                                <td>{!! $item->type_name !!}</td>
                                <td>{!! $item->brewery_name !!}</td>
                                <td>
                                    <a href="{{ route('beers.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-danger beer-destroy" data-id="{{$item->id}}">Delete</a>
                                    {{ Form::open(['action' => ['Brewery\BeerController@destroy', $item->id], 'id' => 'form-destroy-'.$item->id]) }}
                                        {{ method_field('delete') }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        {{ $beer->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection