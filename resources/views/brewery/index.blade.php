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
                        <h4 class="title">Breweries</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('brewery.create') }}" class="btn btn-primary">Create New</a>
                            </div>
                            <div class="col-md-3">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <i class="material-icons">bubble_chart</i>
                                            <span class="notification">Filter by beer type  <b>{{ Request::input('type') ? $beer_types[Request::input('type')] : '' }}</b></span>
                                            <p class="hidden-lg hidden-md">Notifications</p>
                                            <div class="ripple-container"></div></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ action('Brewery\BreweryController@index') }}">All</a>
                                            </li>
                                            @forelse($beer_types as $id => $type)
                                                <li>
                                                    <a href="{{ action('Brewery\BreweryController@index', ['type' => $id]) }}">{{ $type }}</a>
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
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @forelse($brewery as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! str_limit($item->description, 60) !!}</td>
                                <td>
                                    <a href="{{ route('brewery.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-danger brewery-destroy" data-id="{{$item->id}}">Delete</a>
                                    {{ Form::open(['action' => ['Brewery\BreweryController@destroy', $item->id], 'id' => 'form-destroy-'.$item->id]) }}
                                        {{ method_field('delete') }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        {{ $brewery->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.brewery-destroy', function(){
            var destroy_id = $(this).data('id');
            $('#form-destroy-'+destroy_id).submit()
        });
    </script>
@endsection
