<div class="row mb-3{{ $errors->has('concepto') ? ' has-error' : '' }}">
    {!! Form::label('concepto', 'Nombre del concepto:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('concepto', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre del concepto de Ingreso o Egreso.. Ejemplo Gasolina']) !!}
    	<small class="text-danger">{{ $errors->first('concepto') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('slug') ? ' has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
        <small class="text-danger">{{ $errors->first('slug') }}</small>
    </div>
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0 me-4">Seleccione el tipo de concepto:</legend>
    <div class="col-sm-9">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="gridRadios1" value="Ingreso" checked>
            <label class="form-check-label" for="gridRadios1">
                Ingreso
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="gridRadios2" value="Egreso">
            <label class="form-check-label" for="gridRadios2">
                Egreso
            </label>
        </div>
    </div>
</fieldset>