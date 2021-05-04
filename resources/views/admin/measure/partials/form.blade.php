<div class="row mb-3{{ $errors->has('medida') ? ' has-error' : '' }}">
    {!! Form::label('medida', 'Medida:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('medida', null, ['class' => 'form-control', 'placeholder' =>'Ejemplos: Kilogramo, Pieza']) !!}
    	<small class="text-danger">{{ $errors->first('medida') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('simbolo') ? ' has-error' : '' }}">
    {!! Form::label('simbolo', 'Medida:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('simbolo', null, ['class' => 'form-control', 'placeholder' =>'Ejemplos: kg, pza']) !!}
        <small class="text-danger">{{ $errors->first('simbolo') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        <small class="text-danger">{{ $errors->first('slug') }}</small>
    </div>
</div>