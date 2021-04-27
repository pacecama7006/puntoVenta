<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre del proveedor...']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('rfc_number') ? ' has-error' : '' }}">
    {!! Form::label('rfc_number', 'R.F.C.:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('rfc_number', null, ['class' => 'form-control', 'placeholder' =>'Escriba el Registro Federal de Contribuyentes del proveedor...']) !!}
        <small class="text-muted">Campo Opcional</small>
        <small class="text-danger">{{ $errors->first('rfc_number') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('adress') ? ' has-error' : '' }}">
    {!! Form::label('adress', 'Dirección:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('adress', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el domicilio completo del proveedor...']) !!}
        <small class="text-danger">{{ $errors->first('adress') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Teléfono de contacto:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ejemplo 353-321-9988']) !!}
        <small class="text-danger">{{ $errors->first('phone') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'ejemplo@hotmail.com...']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
</div>


