
{{ Form::model($type, $type->exists ?
                            ['route'  => ['beer_type.update', $type->id], 'method' => 'PUT'] :
                            ['route'  => 'beer_type.store', 'method' => 'POST']
                        ) }}

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', 'Name ' . $errors->first('name'), ['class' => 'control-label']) }}
    {{ Form::text('name', $type->name,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit($type->exists ? 'Update' : 'Create',['class' => 'btn btn-success'])}}
</div>

{{ Form::close() }}