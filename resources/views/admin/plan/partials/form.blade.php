<div class="form-group">
    {!! Form::label('bsd_tipo_servicio_id', 'Tipo de Servicio') !!}
    {!! Form::select('bsd_tipo_servicio_id', $tiposervicios, null, ['class' => 'form-control']) !!}

    @error('bsd_tipo_servicio_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('nombre_plan', 'Nombre de Plan') !!}
    {!! Form::text('nombre_plan', null, ['class' => 'form-control']) !!}

    @error('nombre_plan')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('precio', 'Precio') !!}
    {!! Form::text('precio', null, ['class' => 'form-control']) !!}

    @error('precio')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>