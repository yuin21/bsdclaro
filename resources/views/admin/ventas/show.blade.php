@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Ver Venta</h1>
@stop

@section('content')
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
                                    {{ $venta->tipo_contrato === 'V' ? 'Virtual' : 'Fisico' }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Saliforce: </span>
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
                                    <span class="text-bold tag-detalle">Fecha Envio: </span>
                                    {{ $venta->fecha_envio }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Fecha Entrega: </span>
                                    {{ $venta->fecha_entrega }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Nivel de Venta%: </span> {{ $venta->nivel_venta }} %
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
                                    <th>Cantidad/UGIS</th>
                                    <th>Números de linea nueva</th>
                                    <th>Equipo/Producto</th>
                                    <th>Operador</th>
                                    <th>Estado de Linea</th>
                                    <th>Fecha de Activado</th>
                                    <th>Fecha Liquidado</th>
                                    <th>Fecha de Instalación</th>
                                    <th>Hora</th>
                                    <th>Total</th>
                                    <th>Sin IGV</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalleVenta">
                                @foreach ($venta->detallesventa as $detalle)
                                    <tr>
                                        <td width="20px">{{ $loop->iteration }}</td>
                                        <td> {{ $detalle->tipoServicio->nom_tipo_servicio }}</td>
                                        <td> {{ $detalle->servicio->nom_servicio }}</td>
                                        <td> {{ $detalle->plan->nombre_plan }}</td>
                                        <td> {{ $detalle->plan->precio }}</td>
                                        <td> {{ $detalle->cantidad }}</td>
                                        <td>
                                            @foreach ($detalle->numerosLineaNueva as $numero)
                                                <span class="badge bg-secondary">
                                                    {{ $numero->numero_linea_nueva }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td> {{ $detalle->equipo_producto }}</td>
                                        <td> {{ $detalle->operador }}</td>
                                        <td> {{ $detalle->estado_linea }}</td>
                                        <td> {{ $detalle->fecha_activado }}</td>
                                        <td> {{ $detalle->fecha_liquidado }}</td>
                                        <td> {{ $detalle->fecha_instalacion }}</td>
                                        <td> {{ $detalle->hora }}</td>
                                        <td> {{ $detalle->cf_con_igv }}</td>
                                        <td> {{ $detalle->cf_sin_igv }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center text-danger" style="gap: 10px;">
                        {!! Form::label('total', 'Total', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal', $venta->total, ['class' => 'form-control text-danger', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Total sin igv', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', round($venta->total / 1.18, 2), ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
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

@section('css')
    <style>
        .tag-detalle {
            display: inline-block;
            min-width: 190px;
        }

    </style>
@stop
