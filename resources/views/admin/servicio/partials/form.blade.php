<div class="form-group">
<div class="row">
    <div class="col-6">
        {!! Form::label('bsd_tipo_servicio_id', 'Tipo de Servicio') !!}
        {!! Form::select('bsd_tipo_servicio_id', $tiposervicios, null, ['class' => 'form-control']) !!}

        @error('bsd_tipo_servicio_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-6">
        {!! Form::label('nom_servicio', 'Nombre de Servicio') !!}
        {!! Form::text('nom_servicio', null, ['class' => 'form-control']) !!}

        @error('nom_servicio')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
</div>