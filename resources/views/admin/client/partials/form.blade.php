<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre del cliente...']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('rfc_number') ? ' has-error' : '' }}">
    {!! Form::label('rfc_number', 'R.F.C.:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('rfc_number', null, ['class' => 'form-control', 'placeholder' =>'Ejemplo xxxx-600625-x65 máximo 15 caracteres']) !!}
        <small class="text-muted">Campo Opcional (Máximo 15 caracteres)</small>
        <small class="text-danger">{{ $errors->first('rfc_number') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Dirección:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' =>'Escriba el domicilio completo del cliente...']) !!}
        <small class="text-muted">Campo Opcional (Máximo 255 caracteres)</small>
        <small class="text-danger">{{ $errors->first('address') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Teléfono de contacto:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' =>'Ejemplo 353-321-9988 Máximo 12 caracteres']) !!}
        <small class="text-muted">Campo Opcional (Máximo 12 caracteres)</small>
        <small class="text-danger">{{ $errors->first('phone') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' =>'ejemplo@hotmail.com...']) !!}
        <small class="text-muted">Campo Opcional</small>
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
</div>


