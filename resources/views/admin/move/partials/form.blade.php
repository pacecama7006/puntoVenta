<div class="row mb-3{{ $errors->has('fecha_mov') ? ' has-error' : '' }}">
    {!! Form::label('fecha_mov', 'Fecha del movimiento', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::date('fecha_mov', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('fecha_mov') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('box_id') ? ' has-error' : '' }}">
    {!! Form::label('box_id', 'Seleccione la caja en la que se realiza el movimiento:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('box_id', $boxes, null, ['id' => 'box_id', 'class' => 'form-select form-select-lg']) !!}
        <small class="text-danger">{{ $errors->first('box_id') }}</small>
    </div>
</div>
<div class="row mb-3{{ $errors->has('detalle') ? ' has-error' : '' }}">
    {!! Form::label('detalle', 'Motivo del Ingreso o Egreso:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('detalle', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el motivo del Ingreso o Egreso']) !!}
        <small class="text-danger">{{ $errors->first('detalle') }}</small>
    </div>
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0 me-4">Seleccione el tipo de movimiento:</legend>
    <div class="col-sm-9">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="Ingreso" checked>
            <label class="form-check-label" for="gridRadios1">
                Ingreso
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="Egreso">
            <label class="form-check-label" for="gridRadios2">
                Egreso
            </label>
        </div>
    </div>
</fieldset>
@if (Route::currentRouteName()=='moves.edit')
    <div class="row mb-3{{ $errors->has('conciliado') ? ' has-error' : '' }}">
        {!! Form::label('conciliado', '¿El movimiento está conciliado?', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('conciliado', ['0' => 'No conciliado', '1' =>'Conciliado'], null, ['id' => 'conciliado', 'class' => 'form-select form-select-lg']) !!}
            <small class="text-danger">{{ $errors->first('conciliado') }}</small>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        {{-- Imagen que se muestra por defecto si el usuario no selecciona una --}}
        <div class="col">
            {{-- la clase image-wrapper la tengo abajo en la sección css --}}
            <div class="image-wrapper">
                {{-- El id picture lo utilizo en la sección de js para hacer modificaciones
                a la imagen, cuando el usuario selecciona otra imagen --}}
                {{-- Si existe una imágen relacionada al post. Accedo al post y a su relación
                    con el método isset verificamos si está definido lo que está entre paréntesis--}}
                @isset ($move->image)
                    {{-- Accedo a la imagen mediante el facade Storage y su método url, donde paso el post, su relación y el atributo url de la tabal imagen --}}
                    <img id="picture" src="{{ Storage::url($move->image) }}">
                @endisset
            </div>
        </div>
        <div class="col-md-6 ms-3{{ $errors->has('image') ? ' has-error' : '' }}">
            {!! Form::label('image', 'Agregue una imagen de la nota o factura:', ['class' => 'form-label']) !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
            <p class="help-block text-muted">Campo opcional</p>
            <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>
    </div>
    <div class="row mb-3{{ $errors->has('concept_id') ? ' has-error' : '' }}">
        {!! Form::label('concept_id', 'Seleccione el concepto del gasto:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('concept_id', $concepts, null, ['id' => 'concept_id', 'class' => 'form-select form-select-lg']) !!}
            <small class="text-danger">{{ $errors->first('concept_id') }}</small>
        </div>
    </div>
    <div class="row mb-3{{ $errors->has('importe') ? ' has-error' : '' }}">
        {!! Form::label('importe', 'Importe del movimiento::', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('importe', null, ['class' => 'form-control', 'placeholder' =>'importe del movimiento...']) !!}
            <small class="text-danger">{{ $errors->first('importe') }}</small>
        </div>
    </div>
@else
    <div class="row mb-3{{ $errors->has('concept_id') ? ' has-error' : '' }}">
        {!! Form::label('concept_id', 'Seleccione el concepto del gasto:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('concept_id', $concepts, null, ['id' => 'concept_id', 'class' => 'form-select form-select-lg']) !!}
            <small class="text-danger">{{ $errors->first('concept_id') }}</small>
        </div>
    </div>
    <div class="row mb-3{{ $errors->has('importe') ? ' has-error' : '' }}">
        {!! Form::label('importe', 'Importe del movimiento::', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('importe', null, ['class' => 'form-control', 'placeholder' =>'importe del movimiento...']) !!}
            <small class="text-danger">{{ $errors->first('importe') }}</small>
        </div>
    </div>
    <div class="row mb-3{{ $errors->has('image') ? ' has-error' : '' }}">
        {!! Form::label('image', 'Agregue una imagen de la nota o factura:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('image', ['class' => 'form-control',]) !!}
            <p class="help-block text-muted">Campo opcional</p>
            <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>
    </div>
@endif
