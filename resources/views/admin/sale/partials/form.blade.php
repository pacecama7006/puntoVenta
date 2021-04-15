<div class="col-md-4{{ $errors->has('num_vta') ? ' has-error' : '' }}">
    {!! Form::label('num_vta', 'Número de venta:', ['class' => 'form-label']) !!}
    {!! Form::number('num_vta', null, ['class' => 'form-control', 'placeholder' =>'Indique el número de venta']) !!}
    <small class="text-danger">{{ $errors->first('num_vta') }}</small>
</div>
<div class="col-md-4{{ $errors->has('sale_date') ? ' has-error' : '' }}">
    {!! Form::label('sale_date', 'Fecha de la venta:', ['class' => 'form-label']) !!}
    {!! Form::date('sale_date', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('sale_date') }}</small>
</div>
<div class="col-md-4{{ $errors->has('client_id') ? ' has-error' : '' }}">
    {!! Form::label('client_id', 'Seleccione un Cliente:', ['class' => 'form-label']) !!}
    {!! Form::select('client_id', $clients, null, ['placeholder' => 'Menú de clientes','id' => 'client_id','class' => 'form-select']) !!}
    <small class="text-danger">{{ $errors->first('client_id') }}</small>
</div>
<div class="col-md-3">
    <label for="product_id" class="form-label">Seleccione un Producto:</label>
    <select id="product_id" name="product_id" class="form-select">
      <option selected>Menu de productos...</option>
      @foreach ($products as $product)
            <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->sell_price }}">
                {{ $product->name }}
            </option>
          @endforeach
    </select>
  </div>
<div class="col-md-3">
  <label for="code" class="form-label">Código de barras</label>
  <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div>
{{-- <div class="col-md-3{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', 'Código de barras:', ['class' => 'form-label']) !!}
    {!! Form::text('code', null, ['id' =>'code', 'name' => 'code', 'class' => 'form-control', 'aria-describedby' => 'helpId']) !!}
    <small class="text-muted">Campo opcional</small>
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div> --}}
<div class="col-md-3{{ $errors->has('stock') ? ' has-error' : '' }}">
    {!! Form::label('stock', 'Stock actual:', ['class' => 'form-label']) !!}
    {!! Form::text('stock', null, ['id' =>'stock', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
    <small class="text-danger">{{ $errors->first('stock') }}</small>
</div>
<div class="col-md-3{{ $errors->has('quantity') ? ' has-error' : '' }}">
    {!! Form::label('quantity', 'Cantidad:', ['class' => 'form-label']) !!}
    {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' =>'cantidad de producto (s)...']) !!}
    <small class="text-danger">{{ $errors->first('quantity') }}</small>
</div>
<div class="col-md-3{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Precio:', ['class' => 'form-label']) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'disabled' =>'disabled']) !!}
    <small class="text-danger">{{ $errors->first('price') }}</small>
</div>
<div class="col-md-3{{ $errors->has('tax') ? ' has-error' : '' }}">
    {!! Form::label('tax', 'Impuesto:', ['class' => 'form-label']) !!}
    {!! Form::number('tax', '0', ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('tax') }}</small>
</div>
<div class="col-md-3{{ $errors->has('discount') ? ' has-error' : '' }}">
    {!! Form::label('discount', 'Descuento:', ['class' => 'form-label']) !!}
    {!! Form::number('discount', '0', ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('discount') }}</small>
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
    <h4 class="card-title">Detalles de Venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio (Pesos)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Subtotal (Pesos)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">SUB-TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
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