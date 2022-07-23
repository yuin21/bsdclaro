@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.pagos.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de pagos
    </a>
    <h1 class="text-bold">Ver Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    {{-- <h5 class="flex-grow-1">Venta: <span class="badge badge-warning">{{ $venta->fecha_registro }}</span> --}}
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
                                    <span class="text-bold tag-detalle">Nombre del Personal: </span>
                                    {{ $pago->cuotapersonal->personal->getFullNameAttribute()}}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Total de Venta: </span>
                                    {{ $pago->venta->total}}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">% de Comisión: </span>
                                    {{ $pago->porcentaje_comision }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Comisión Consultor: </span>
                                    {{ $pago->comision_consultor }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Estado Carpeta: </span>
                                    {{ $pago->estado_carpeta }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Pago 1er Recibo: </span>
                                    {{ $pago->pago_1er_recibo }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Pago Dace: </span>
                                    {{ $pago->pago_dace}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Abono Consultor: </span>
                                    {{ $pago->abono_consultor }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Total Pago: </span>
                                    {{ $pago->total_pago }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Porcentaje Cumplimiento Dic: </span>
                                    {{ $pago->porcentaje_cump_dic }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Suma Total de Ventas: </span>
                                    {{ $pago->sum_total_ventas }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Suma Renta Total Ventas: </span>
                                    {{ $pago->sum_renta_total_ventas }}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-bold tag-detalle">Suma Comisión Bruta Dace: </span>
                                    {{ $pago->sum_comision_bruta_dace }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de pagos</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="border">
                                <tr>
                                    <th>Item</th>
                                    <th>Pago</th>
                                    <th>Venta</th>
                                    <th>Detalle Venta</th>
                                    <th>Cuota</th>
                                    <th>Comision Consultor</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetallePago">
                                @foreach ($pago->detallespago as $detalle)
                                    <tr>
                                        <td width="20px">{{ $loop->iteration }}</td>
                                        <td> {{ $detalle->pago->id}}</td>
                                        <td> {{ $detalle->venta->id}}</td>
                                        <td> {{ $detalle->detalleventa->id }}</td>
                                        <td class="tag-number" id="cuota"> {{ number_format($detalle->cuota, 2) }}</td>
                                        <td class="tag-number" id="comisionconsultor"> {{ number_format($detalle->comision_consultor, 2) }}</td>
                                        <td class="tag-number" id="subtotal"> {{ number_format($detalle->sub_total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-end align-items-center text-danger" style="gap: 10px;">
                        {!! Form::label('total', 'Total', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal', number_format($venta->total, 2), ['class' => 'form-control text-danger', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Total sin igv', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', round($venta->total / 1.18, 2), ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-4">
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
        </div> --}}
    </div>
@stop

@section('css')
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
