<div class="form-group">
    {!! Form::label('nom_personal', 'Nombre') !!}
    {!! Form::text('nom_personal', null, ['class' => 'form-control']) !!}

    @error('nom_personal')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('ape_paterno', 'Apellido paterno') !!}
    {!! Form::text('ape_paterno', null, ['class' => 'form-control']) !!}

    @error('ape_paterno')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ape_materno', 'Apellido materno') !!}
    {!! Form::text('ape_materno', null, ['class' => 'form-control']) !!}
    @error('ape_materno')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('cargo', 'Cargo') !!}
    {!! Form::text('cargo', null, ['class' => 'form-control']) !!}
    @error('cargo')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('tipo_personal', 'Tipo de Personal') !!}
    {!! Form::text('tipo_personal', null, ['class' => 'form-control']) !!}
    @error('tipo_personal')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label(null, 'Tipo de documento') !!}


    <div class="form-group border rounded-lg p-2">
        @foreach ($tipos_doc as $tipo)
            <div>
                <label>
                    {!! Form::radio('tipo_doc_iden', $tipo->cod, null, ['class' => 'mr-1']) !!}
                    ({{ $tipo->cod }})
                    {{ $tipo->name }}
                </label>
            </div>
        @endforeach
    </div>
    @error('tipo_doc_iden')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('nro_doc_iden', 'Número de documento') !!}
    {!! Form::text('nro_doc_iden', null, ['class' => 'form-control']) !!}
    @error('nro_doc_iden')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('celular', 'Celular') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
