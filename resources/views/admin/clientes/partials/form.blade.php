<div class="form-group">
    {!! Form::label('ruc', 'Ruc') !!}
    {!! Form::text('ruc', null, ['class' => 'form-control', 'id' => 'ruc']) !!}

    @error('ruc')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('razon_social', 'Razon Social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control', 'id' => 'razon_social']) !!}

    @error('razon_social')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('num_celular', 'Número celular') !!}
    {!! Form::text('num_celular', null, ['class' => 'form-control']) !!}

    @error('num_celular')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

    @error('direccion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('departamento', 'Departamento') !!}
    {!! Form::text('departamento', null, ['class' => 'form-control']) !!}

    @error('departamento')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('provincia', 'Provincia') !!}
    {!! Form::text('provincia', null, ['class' => 'form-control']) !!}

    @error('provincia')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('distrito', 'Distrito') !!}
    {!! Form::text('distrito', null, ['class' => 'form-control']) !!}

    @error('distrito')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('tipo_cliente', 'Tipo de Cliente') !!}
    {!! Form::text('tipo_cliente', null, ['class' => 'form-control']) !!}

    @error('tipo_cliente')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
