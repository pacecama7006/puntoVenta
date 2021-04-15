<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre de la categoría..']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        <small class="text-danger">{{ $errors->first('slug') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descripción:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
    	{!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '5']) !!}
    	<small class="text-danger">{{ $errors->first('description') }}</small>
    </div>

</div>