<div class="col-md-3{{ $errors->has('num_compra') ? ' has-error' : '' }}">
    {!! Form::label('num_compra', 'Num. de Compra:', ['class' => 'form-label']) !!}
    {!! Form::number('num_compra', $num_compra, ['class' => 'form-control', 'disabled' => 'disabled', 'value' => '$num_compra']) !!}
    <small class="text-danger">{{ $errors->first('num_compra') }}</small>
</div>
<div class="col-md-3{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
    {!! Form::label('purchase_date', 'Fecha de la compra:', ['class' => 'form-label']) !!}
    {!! Form::date('purchase_date', $fecha_compra, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
    <small class="text-danger">{{ $errors->first('purchase_date') }}</small>
</div>
<div class="col-md-3{{ $errors->has('provider_id') ? ' has-error' : '' }}">
    {!! Form::label('provider_id', 'Seleccione un Proveedor:', ['class' => 'form-label']) !!}
    {!! Form::select('provider_id', $providers, null, ['id' => 'provider_id','class' => 'form-select']) !!}
    <small class="text-danger">{{ $errors->first('provider_id') }}</small>
</div>
<div class="col-md-3{{ $errors->has('bar_code') ? ' has-error' : '' }}">
    {!! Form::label('bar_code', 'Código de barras:', ['class' => 'form-label']) !!}
    {!! Form::text('bar_code', null, ['id' =>'bar_code', 'class' => 'form-control', 'aria-describedby' => 'helpId']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="text-danger">{{ $errors->first('bar_code') }}</small>
</div>
{{-- <div class="col-md-3{{ $errors->has('product_id') ? ' has-error' : '' }}">
    {!! Form::label('product_id', 'Seleccione un Producto:', ['class' => 'form-label']) !!}
    {!! Form::select('product_id', $products, null, ['placeholder'=> 'Seleccione un producto', 'id' => 'product_id','class' => 'form-select']) !!}
    <small class="text-danger">{{ $errors->first('product_id') }}</small>
</div> --}}
<div class="form-group col-md-3">
    <div class="form-group">
        <label for="product_id" class="form-label mb-3">Producto</label>
            <select class="form-control" name="product_id" id="product_id">
            <option value="" disabled selected></option>
            @foreach ($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-3{{ $errors->has('quantity') ? ' has-error' : '' }}">
    {!! Form::label('quantity', 'Cantidad:', ['class' => 'form-label']) !!}
    {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' =>'cantidad de producto (s)...', 'step' => '0.1']) !!}
    <small class="text-danger">{{ $errors->first('quantity') }}</small>
</div>
<div class="col-md-3{{ $errors->has('medida') ? ' has-error' : '' }}">
    {!! Form::label('medida', 'Medida:', ['class' => 'form-label']) !!}
    {!! Form::text('medida', null, ['id' =>'medida', 'class' => 'form-control', 'aria-describedby' => 'helpId', 'disabled' => 'disabled']) !!}
    <small class="text-danger">{{ $errors->first('medida') }}</small>
</div>
<div class="col-md-3{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Precio:', ['class' => 'form-label']) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'disabled' =>'disabled', 'step' => '0.1']) !!}
    <small class="text-danger">{{ $errors->first('price') }}</small>
</div>
<div class="col-md-3{{ $errors->has('tax') ? ' has-error' : '' }}">
    {!! Form::label('tax', 'Impuesto:', ['class' => 'form-label']) !!}
    {!! Form::number('tax', '0', ['class' => 'form-control', 'step' => '0.1']) !!}
    <small class="text-danger">{{ $errors->first('tax') }}</small>
</div>
<div class="col-md-6{{ $errors->has('picture') ? ' has-error' : '' }}">
    {!! Form::label('picture', 'Seleccione una imagen: ', ['class' => 'form-label']) !!}
    {!! Form::file('picture', ['class' => 'form-control']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="help-block">Sólo imágenes o PDF</small>
    <small class="text-danger">{{ $errors->first('picture') }}</small>
</div>
<div class="btn-group float-end me-5 mb-4">
    <button class="btn btn-primary float-end me-2" type="button" id="agregar">
        Agregar producto
    </button>
</div>
<br>
<br>
<br>
<div class="row mb-3">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio (Pesos)</th>
                    <th>Cantidad</th>
                    <th>Subtotal (Pesos)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">SUB-TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">$ 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL A PAGAR:</p>
                    </th>
                    <th>
                        <p align="right">
                            <span align="right" id="total_pagar_html">$ 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
            <tbody></tbody>
        </table>
    </div>
</div>