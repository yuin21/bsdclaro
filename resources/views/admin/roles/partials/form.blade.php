<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{!! Form::label(null, 'Lista de permisos') !!}
{{-- <h2 class="h3">Lista de permisos</h2> --}}
<div class="form-group border rounded-lg p-2 row mb-4">
    @foreach ($permissions as $permission)
        @if(strpos($permission->name, 'adminlt') !== false)
            <div class="col-lg-3 col-sm-6">
                <ul class="list-group">
        @endif
                    <li class="list-group-item">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{ $permission->description }}
                    </li>
        @if(strpos($permission->name, 'indexf') !== false)
                </ul>
            </div>
        @endif
    @endforeach
</div>
