<div class="form-group">
    {!! Form::label('tipo_consultor', 'Tipo de Consultor') !!}
    {!! Form::text('tipo_consultor', null, ['class' => 'form-control']) !!}

    @error('tipo_consultor')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('tipo_venta', 'Tipo de Venta') !!}
    {!! Form::text('tipo_venta', null, ['class' => 'form-control']) !!}

    @error('tipo_venta')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('personal', 'Personal') !!}
    {!! Form::text('personal', null, ['class' => 'form-control']) !!}

    @error('personal')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('cantidad_cuota', 'Cantidad de Cuota') !!}
    {!! Form::text('cantidad_cuota', null, ['class' => 'form-control']) !!}

    @error('cantidad_cuota')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('mes', 'Mes') !!}
    {!! Form::text('mes', null, ['class' => 'form-control']) !!}

    @error('mes')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('año', 'Año') !!}
    {!! Form::text('año', null, ['class' => 'form-control']) !!}

    @error('año')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
