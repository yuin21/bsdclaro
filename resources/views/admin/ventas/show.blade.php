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
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="text-bold">Tipo de contrato: </span> {{ $venta->tipo_contrato }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de venta</p>
                </div>
                <div class=" card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="border">
                            <tr>
                                <th>#</th>
                                <th>Tipo Servicio</th>
                                <th>Servicio</th>
                                <th>Plan</th>
                                <th>Precio Plan</th>
                                <th>Cantidad</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
