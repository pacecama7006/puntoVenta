<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre de la caja:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>'Escriba el nombre de la caja..']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('user_id') ? ' has-error' : '' }}">
    {!! Form::label('user_id', 'Seleccione un Responsable de la caja', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $users, null, ['id' => 'user_id', 'class' => 'form-select form-select-lg']) !!}
        <small class="text-danger">{{ $errors->first('user_id') }}</small>
    </div>
</div>
