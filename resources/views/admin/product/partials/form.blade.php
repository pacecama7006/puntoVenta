<div class="col-md-2{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', 'Código del producto:', ['class' => 'form-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div>
<div class="col-md-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>'Escriba el nombre del producto...']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="col-md-3{{ $errors->has('slug') ? ' has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'form-label']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
    <small class="text-danger">{{ $errors->first('slug') }}</small>
</div>
<div class="col-md-2{{ $errors->has('bar_code') ? ' has-error' : '' }}">
    {!! Form::label('bar_code', 'Código de barras:', ['class' => 'form-label']) !!}
    {!! Form::text('bar_code', null, ['class' => 'form-control']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="text-danger">{{ $errors->first('bar_code') }}</small>
</div>
<div class="col-md-2{{ $errors->has('measure_id') ? ' has-error' : '' }}">
        {!! Form::label('measure_id', 'Medida:', ['class' => 'form-label']) !!}
        {!! Form::select('measure_id', $measures, null, ['id' => 'measure_id', 'class' => 'form-select']) !!}
        <small class="text-danger">{{ $errors->first('measure_id') }}</small>
    </div>
<div class="col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descripción', ['class' => 'col-sm-2 form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>

@if (Route::currentRouteName()=='products.create')
    <div class="col-md-4{{ $errors->has('image') ? ' has-error' : '' }}">
        {!! Form::label('image', 'Seleccione una imagen: ', ['class' => 'form-label']) !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
        <p class="help-block">Sólo imágenes</p>
        <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>

    {{-- <div class="card-body">
        <h4 class="card-title d-flex">Imágen del producto
            <small class="ml-auto align-self-end">
                <a href="dropify.html" class="font-weight-light" target="_blank">Selecciona una imágen</a>
            </small>
        </h4>
        <input type="file" name="image" class="dropify" />
    </div> --}}
@else
    <div class="row mb-3 mt-3">
        {{-- Imagen que se muestra por defecto si el usuario no selecciona una --}}
        <div class="col">
            {{-- la clase image-wrapper la tengo abajo en la sección css --}}
            <div class="image-wrapper">
                {{-- El id picture lo utilizo en la sección de js para hacer modificaciones
                a la imagen, cuando el usuario selecciona otra imagen --}}
                {{-- Si existe una imágen relacionada al post. Accedo al post y a su relación
                    con el método isset verificamos si está definido lo que está entre paréntesis--}}
                @isset ($product->image)
                    {{-- Accedo a la imagen mediante el facade Storage y su método url, donde paso el post, su relación y el atributo url de la tabal imagen --}}
                    <img id="picture" src="{{ Storage::url($product->image) }}">
                @endisset
            </div>
        </div>
        <div class="col-md-6 ms-3{{ $errors->has('image') ? ' has-error' : '' }}">
            {!! Form::label('image', 'Imagen: ', ['class' => 'form-label']) !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
            <p class="help-block">Imagen no mayor a 500mb</p>
            <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>
    </div>
    <div class="col-md-4{{ $errors->has('sell_price') ? ' has-error' : '' }}">
        {!! Form::label('sell_price', 'Precio de venta:', ['class' => 'form-label']) !!}
        {!! Form::number('sell_price', null, ['class' => 'form-control','step' => '0.1']) !!}
        <small class="text-danger">{{ $errors->first('sell_price') }}</small>
    </div>

    <div class="col-md-4{{ $errors->has('category_id') ? ' has-error' : '' }}">
        {!! Form::label('category_id', 'Seleccione una categoría', ['class' => 'form-label']) !!}
        {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'form-select']) !!}
        <small class="text-danger">{{ $errors->first('category_id') }}</small>
    </div>

    <div class="col-md-4{{ $errors->has('provider_id') ? ' has-error' : '' }}">
        {!! Form::label('provider_id', 'Seleccione un Proveedor', ['class' => 'form-label']) !!}
        {!! Form::select('provider_id', $providers, null, ['id' => 'provider_id', 'class' => 'form-select']) !!}
        <small class="text-danger">{{ $errors->first('provider_id') }}</small>
    </div>
@endif
@if (Route::currentRouteName()=='products.create')
    <div class="col-md-2{{ $errors->has('sell_price') ? ' has-error' : '' }}">
        {!! Form::label('sell_price', 'Precio de venta:', ['class' => 'form-label']) !!}
        {!! Form::number('sell_price', null, ['class' => 'form-control','step' => '0.1']) !!}
        <small class="text-danger">{{ $errors->first('sell_price') }}</small>
    </div>

    <div class="col-md-3{{ $errors->has('category_id') ? ' has-error' : '' }}">
        {!! Form::label('category_id', 'Selecciones una categoría', ['class' => 'form-label']) !!}
        {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'form-select']) !!}
        <small class="text-danger">{{ $errors->first('category_id') }}</small>
    </div>

    <div class="col-md-3{{ $errors->has('provider_id') ? ' has-error' : '' }}">
        {!! Form::label('provider_id', 'Seleccione un Proveedor', ['class' => 'form-label']) !!}
        {!! Form::select('provider_id', $providers, null, ['id' => 'provider_id', 'class' => 'form-select']) !!}
        <small class="text-danger">{{ $errors->first('provider_id') }}</small>
    </div>
@endif


