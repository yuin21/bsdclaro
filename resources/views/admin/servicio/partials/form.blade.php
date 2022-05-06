<div class="form-group">
    {!! Form::label('nombre_servicio', 'Nombre de Servicio') !!}
    {!! Form::text('nombre_servicio', null, ['class' => 'form-control']) !!}

    @error('nombre_servicio')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('tipo_servicio', 'Tipo de Servicio') !!}
    {!! Form::text('tipo_servicio', null, ['class' => 'form-control']) !!}

    @error('tipo_servicio')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>