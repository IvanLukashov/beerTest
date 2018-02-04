
{{ Form::model($beer, $beer->exists ?
                            ['route'  => ['beers.update', $beer->id], 'method' => 'PUT'] :
                            ['route'  => 'beers.store', 'method' => 'POST']
                        ) }}

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', 'Name ' . $errors->first('name'), ['class' => 'control-label']) }}
    {{ Form::text('name', $beer->name,['class' => 'form-control']) }}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('description', 'Description ' . $errors->first('description'), ['class' => 'control-label']) }}
    {{ Form::textarea('description', $beer->description,['class' => 'form-control']) }}
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    {{ Form::label('type', 'Type ' . $errors->first('type'), ['class' => 'control-label']) }}
    {{ Form::select('type_id', $beer_types, null, ['class' => 'form-control']) }}
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    {{ Form::label('brewery', 'brewery ' . $errors->first('brewery'), ['class' => 'control-label']) }}
    {{ Form::select('brewery_id', $breweries, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit($beer->exists ? 'Update' : 'Create',['class' => 'btn btn-success'])}}
</div>

{{ Form::close() }}