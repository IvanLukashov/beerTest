
{{ Form::model($brewery, $brewery->exists ?
                            ['route'  => ['brewery.update', $brewery->id], 'method' => 'PUT'] :
                            ['route'  => 'brewery.store', 'method' => 'POST']
                        ) }}

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('name', 'Name ' . $errors->first('name'), ['class' => 'control-label']) }}
    {{ Form::text('name', $brewery->name,['class' => 'form-control']) }}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('description', 'Description ' . $errors->first('description'), ['class' => 'control-label']) }}
    {{ Form::textarea('description', $brewery->description,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit($brewery->exists ? 'Update' : 'Create',['class' => 'btn btn-success'])}}
</div>

{{ Form::close() }}