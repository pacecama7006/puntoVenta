<div class="row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre:', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-10">
    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>'Escriba el nombre completo del rol..']) !!}
    	<small class="text-danger">{{ $errors->first('name') }}</small>
	</div>
</div>

{{-- Traigo e itero los permiss que vienen del método create de Admin/RoleController --}}
<fieldset class="row mb-3">
<legend class="col-form-label col-sm-2 pt-0 me-4">Seleccione el/los permisos del rol</legend>
    <div class="col-sm-9">
        <div class="form-check">
            @foreach ($permissions as $permission)
            {{-- Como quiero que se pueda seleccionar varios permissions, meto
            el description de los roles en un array --}}
                {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'id', 'class' => 'form-check-input']) !!}
                <label class="form-check-label" for="permissions">
                  {{ $permission->description }}
                </label>
            @endforeach
        </div>
    </div>
</fieldset>