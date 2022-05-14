<div class="form-group">
    {!! Form::label('ruc', 'RUC') !!}
    {!! Form::text('ruc', null, ['class' => 'form-control']) !!}

    @error('ruc')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('razon_social', 'Razon Social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}

    @error('razon_social')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('representante', 'Representante') !!}
    {!! Form::text('representante', null, ['class' => 'form-control']) !!}

    @error('representante')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Direccion') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

    @error('direccion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('celular', 'Celular') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}

    @error('celular')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>