<div class="form-group">
    {!! Form::label('bsd_detalle_venta_id', 'Detalle de venta') !!}
    {!! Form::select('bsd_detalle_venta_id', $detalle_venta, null, ['class' => 'form-control']) !!}

    @error('bsd_detalle_venta_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('numero_linea_nueva', 'Numero de linea nueva') !!}
    {!! Form::text('numero_linea_nueva', null, ['class' => 'form-control']) !!}

    @error('numero_linea_nueva')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>