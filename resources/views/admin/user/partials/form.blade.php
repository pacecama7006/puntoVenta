<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre completo del usuario..']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>
<div class="row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'ejemplo@correo.com']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
</div>
@if (Route::currentRouteName()=='users.create')
    <div class="row mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Contraseña:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('password') }}</small>
    </div>
</div>
@endif
<fieldset class="row mb-3">
<legend class="col-form-label col-sm-2 pt-0 me-4">Seleccione el rol del usuario</legend>
    <div class="col-sm-9">
        <div class="form-check">
            @foreach ($roles as $role)
            {{-- Como quiero que se pueda seleccionar varios roles, meto
            el name de los roles en un array --}}
                {!! Form::checkbox('roles[]', $role->id, null, ['id' => 'id', 'class' => 'form-check-input']) !!}
                <label class="form-check-label" for="roles">
                  {{ $role->name }}
                </label>
            @endforeach
        </div>
    </div>
</fieldset>

