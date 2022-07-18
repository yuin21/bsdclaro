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
            {!! Form::label('nombre_plan', 'Nombre de Plan') !!}
            {!! Form::text('nombre_plan', null, ['class' => 'form-control']) !!}

            @error('nombre_plan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('precio', 'Precio') !!}
            {!! Form::text('precio', number_format(0,2), ['class' => 'form-control','id'=>'precio']) !!}

            @error('precio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
