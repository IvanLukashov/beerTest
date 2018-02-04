@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Edit Beer <b>{{ $beer->name }}</b></h4>
                    </div>
                    <div class="card-content table-responsive">
                        @include('beer.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection