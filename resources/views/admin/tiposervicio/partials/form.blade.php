<div class="form-group">
    {!! Form::label('nom_tipo_servicio', 'Tipo de Servicio') !!}
    {!! Form::text('nom_tipo_servicio', null, ['class' => 'form-control']) !!}

    @error('nom_tipo_servicio')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>