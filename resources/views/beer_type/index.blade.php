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
                            <h4 class="title">Beer Types</h4>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('beer_type.create') }}" class="btn btn-primary">Create New</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th class="col-md-2">ID</th>
                                <th class="col-md-8">Name</th>
                                <th class="col-md-2">Actions</th>
                                </thead>
                                <tbody>
                                @forelse($types as $item)
                                    <tr>
                                        <td>{!! $item->id !!}</td>
                                        <td>{!! $item->name !!}</td>
                                        <td>
                                            <a href="{{ route('beer_type.edit', $item->id) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                            <a href="#" class="btn btn-danger beer_type-destroy" data-id="{{$item->id}}">Delete</a>
                                            {{ Form::open(['action' => ['Brewery\BeerTypesController@destroy', $item->id], 'id' => 'form-destroy-'.$item->id]) }}
                                            {{ method_field('delete') }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            {{ $types->appends(Request::except('page'))->links() }}
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
        $(document).on('click', '.beer_type-destroy', function(){
            var destroy_id = $(this).data('id');
            $('#form-destroy-'+destroy_id).submit()
        });
    </script>
@endsection
