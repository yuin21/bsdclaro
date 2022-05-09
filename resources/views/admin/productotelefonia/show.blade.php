@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.productotelefonia.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de producto telefonía
    </a>
    <h1 class="text-bold">Ver Producto Telefonía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Producto Telefonía: <span
                    class="badge badge-warning">{{ $productotelefonia->producto }}</span></h5>
            <a href="{{ route('admin.productotelefonia.edit', $productotelefonia) }}"
                class="btn btn-sm btn-success text-nowrap">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="text-bold">Producto: </span> {{ $productotelefonia->producto }}
                </li>
                <li class="list-group-item">
                    <span class="text-bold">Servicio: </span> {{ $productotelefonia->servicio->nombre_servicio }}
                </li>
                <li class="list-group-item">
                    <span class="text-bold">Tipo de servicio: </span>
                    {{ $productotelefonia->servicio->tipo_servicio }}
                </li>
            </ul>
        </div>
    </div>
@stop

@section('js')
    @if (session('success') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El producto telefonía se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El producto telefonía se creó con éxito',
            })
        </script>
    @endif
@stop
