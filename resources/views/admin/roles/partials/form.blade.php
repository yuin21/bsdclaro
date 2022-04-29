<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{!! Form::label(null, 'Lista de permisos') !!}
{{-- <h2 class="h3">Lista de permisos</h2> --}}
<div class="form-group border rounded-lg p-2">
    @foreach ($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach
</div>
