@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Seguimiento Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($venta, ['route' => ['admin.ventas.tranckingupdate', $venta], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    {!! Form::label('nro_oportunidad', 'Nro. Oportunidad') !!}
                    {!! Form::text('nro_oportunidad', null, ['class' => 'form-control']) !!}
                    @error('nro_oportunidad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-2 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_avance_oportunidad', 'Fecha Avance Oport.', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_avance_oportunidad', $venta->fecha_avance_oportunidad ? Carbon\Carbon::parse($venta->fecha_avance_oportunidad)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_avance_oportunidad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-2 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_oportunidad_ganada', 'Fecha Avance Ganada', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_oportunidad_ganada', $venta->fecha_oportunidad_ganada ? Carbon\Carbon::parse($venta->fecha_oportunidad_ganada)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_oportunidad_ganada')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    {!! Form::label('avance_oportunidad', 'Avance de Oport.') !!}
                    {!! Form::select('avance_oportunidad', ['10' => '10%', '50' => '50%','90' => '90%','100' => '100%'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                    @error('avance_oportunidad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-2 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_entrega', 'Fecha Envio de Exp.', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_entrega', $venta->fecha_entrega ? Carbon\Carbon::parse($venta->fecha_entrega)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_entrega')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_registro', 'Fecha Registro', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_registro', $venta->fecha_registro ? Carbon\Carbon::parse($venta->fecha_registro)->format('Y-m-d') : null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        @error('fecha_registro')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-2 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_conforme', 'Fecha de Exp.', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_conforme', $venta->fecha_conforme ? Carbon\Carbon::parse($venta->fecha_conforme)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_conforme')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    {!! Form::label('estado_venta', 'Estado') !!}
                    {!! Form::select('estado_venta', ['P' => 'Pendiente', 'E' => 'Enviado', 'C' => 'Conforme', 'N' => 'No Conforme'], null, ['class' => 'selectpicker form-control']) !!}
                    @error('estado_venta')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-8 col-sm-6">
                    {!! Form::label('observacion', 'Observación') !!}
                    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
                    @error('observacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <hr>
            <h4 class="text-bold">Detalle</h4>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            @foreach ($venta->detallesventa as $detalle)
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6">
                                            {!! Form::label('servicio', 'Servicio', ['class' => 'text-nowrap']) !!}
                                            {!! Form::text('servicio', $detalle->servicio->nom_servicio, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            {!! Form::label('tipo_servicio', 'Tipo Servicio') !!}
                                            {!! Form::text('tipo_servicio',  $detalle->tipoServicio->nom_tipo_servicio, ['class' => 'selectpicker form-control', 'disabled' => 'disabled']) !!}
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            {!! Form::label('plan', 'Plan') !!}
                                            {!! Form::text('plan', $detalle->plan->nombre_plan, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                        </div>
                                        {{-- <div class="col-lg-4 col-sm-6">
                                            {!! Form::label('estado_id', 'Estado') !!}
                                            {!! Form::text('estado_id', $detalle->estadoLinea->id, ['class' => 'form-control', 'disabled' => 'disabled','id'=>'estado_id']) !!}
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            {!! Form::label('prueba', 'Prueba') !!}
                                            {!! Form::text('prueba', null, ['class' => 'form-control', 'disabled' => 'disabled','id'=>'prueba']) !!}
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            @foreach($estadoslinea as $estados => $estados_linea)
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-6">
                                            {!! Form::label('estado_linea', 'Estado de Linea *') !!}
                                            <select name="estado_linea" id="estadoLinea" class="selectpicker form-control"
                                            title="Seleccionar">
                                                @foreach($estados_linea as $estado => $estado_linea)
                                                    <option
                                                        value="{{ $estado_linea->id }}">
                                                        {{ $estado_linea->nombre_estado_linea }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::submit('Guardar', ['class' => 'btn btn-primary mt-4 float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <h3 class="text-bold">Venta</h3>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h5 class="flex-grow-1">Venta: <span class="badge badge-warning">{{ $venta->fecha_registro }}</span>
                    </h5>
                    {{-- <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-success text-nowrap">
                        <i class="fas fa-pen"></i> Editar
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Tipo de contrato: </span>
                                    {{ $venta->tipo_contrato === 'D' ? 'Digital' : 'Fisico' }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Salesforce: </span>
                                    {{ $venta->salesforce === 'N' ? 'NO' : 'SI' }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">SOT: </span> {{ $venta->sot }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">SEC: </span> {{ $venta->sec }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Nro. Proyecto: </span> {{ $venta->nro_proyecto }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Nro. Solicitud: </span> {{ $venta->solicitud }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Nro. Oportunidad: </span> {{ $venta->nro_oportunidad }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Estado: </span>
                                    {{ $venta->getEstado_Venta()}}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Fecha Conformidad: </span>
                                    {{ $venta->fecha_conforme }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Fecha de Avance de Oportunidad: </span>
                                    {{ $venta->fecha_avance_oportunidad }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Fecha Entrega: </span>
                                    {{ $venta->fecha_entrega }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Fecha Avance Ganada: </span>
                                    {{ $venta->fecha_oportunidad_ganada }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Avance de Oportunidad: </span> {{ $venta->avance_oportunidad }} %
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Observación: </span> {{ $venta->observacion }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de venta</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="border">
                                <tr>
                                    <th>Item</th>
                                    <th>Tipo Servicio</th>
                                    <th>Servicio</th>
                                    <th>Plan</th>
                                    <th>Precio Plan</th>
                                    <th>Cantidad</th>
                                    <th>UGIS</th>
                                    <th>Números de linea nueva</th>
                                    <th>Equipo/Producto</th>
                                    <th>Operador</th>
                                    <th>Estado de Linea</th>
                                    <th>Fecha de Activado</th>
                                    {{-- <th>Fecha Liquidado</th> --}}
                                    <th>Hora</th>
                                    <th>Sin IGV</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalleVenta">
                                @foreach ($venta->detallesventa as $detalle)
                                    <tr>
                                        <td width="20px">{{ $loop->iteration }}</td>
                                        <td> {{ $detalle->tipoServicio->nom_tipo_servicio }}</td>
                                        <td> {{ $detalle->servicio->nom_servicio }}</td>
                                        <td> {{ $detalle->plan->nombre_plan }}</td>
                                        <td class="tag-number" id="precio"> {{ number_format($detalle->precio_plan, 2) }}</td>
                                        <td class="tag-number" id="cantidad"> {{ $detalle->cantidad }}</td>
                                        <td class="tag-number" id="ugis"> {{ $detalle->ugis }}</td>
                                        <td>
                                            @foreach ($detalle->numerosLineaNueva as $numero)
                                                <span class="badge bg-secondary">
                                                    {{ $numero->numero_linea_nueva }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td> {{ $detalle->equipo_producto }}</td>
                                        <td> {{ $detalle->operador }}</td>
                                        <td> {{ $detalle->estadoLinea->nombre_estado_linea }}</td>
                                        <td> {{ $detalle->fecha_activado }}</td>
                                        {{-- <td> {{ $detalle->fecha_liquidado }}</td> --}}
                                        <td> {{ $detalle->hora }}</td>
                                        <td class="tag-number" id="total_sin_igv"> {{ number_format($detalle->cf_sin_igv, 2) }}</td>
                                        <td class="tag-number" id="total_con_igv"> {{ number_format($detalle->cf_con_igv, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Total sin igv', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', round($venta->total / 1.18, 2), ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div>
                    <div class="d-flex justify-content-end align-items-center text-danger" style="gap: 10px;">
                        {!! Form::label('total', 'Total', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal', number_format($venta->total, 2), ['class' => 'form-control text-danger', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Cliente</p>
                </div>
                <div class="card-body">
                    <p>
                        <span class="text-bold">Razón social: </span> {{ $venta->cliente->razon_social }}
                    </p>
                    <p>
                        <span class="text-bold">RUC: </span> {{ $venta->cliente->ruc }}
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Personal</p>
                </div>
                <div class="card-body">
                    <p>
                        <span class="text-bold">Nombre: </span> {{ $venta->personal->getFullNameAttribute() }}
                    </p>
                    <p>
                        <span class="text-bold">Cargo: </span> {{ $venta->personal->cargo }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    @if (session('success') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El seguimiento de la venta se editó con éxito',
            })
        </script>
    @endif

    <script>
        var estado = $('#estado_id').val();
        $('#prueba').val(estado);
        $('#prueba').change();
        $("#estadoLinea").find(`option[value='${estado}']`);
        $('#estadoLinea').selectpicker('refresh');
    </script>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>
        .tag-detalle {
            display: inline-block;
            min-width: 190px;
        }
        .tag-number{
            text-align: right;
        }
    </style>
@stop

