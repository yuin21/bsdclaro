<div class="form-group">
    {!! Form::label('bsd_tipo_servicio_id', 'Tipo de Servicio') !!}
    {!! Form::select('bsd_tipo_servicio_id', $tiposervicios, null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}

    @error('bsd_tipo_servicio_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <div class="row">
        <div class="col-8">
            {!! Form::label('nombre_estado_linea', 'Nombre estado de línea') !!}
            {!! Form::text('nombre_estado_linea', null, ['class' => 'form-control']) !!}

            @error('nombre_estado_linea')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
       
    </div>
</div>