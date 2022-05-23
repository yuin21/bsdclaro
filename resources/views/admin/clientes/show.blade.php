@extends('adminlte::page')

@section('title', 'Ver Clientes')

@section('content_header')
    <a href="{{ route('admin.clientes.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de clientes
    </a>
    <h1 class="text-bold">Ver Cliente</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Ruc:</b> {{ $cliente->ruc }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Razón Social</b> {{ $cliente->razon_social }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Número de celular</b> {{ $cliente->num_celular }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Dirección</b> {{ $cliente->direccion}}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Departamento</b> {{ $cliente->departamento }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Provincia</b> {{ $cliente->provincia}}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Distrito</b> {{ $cliente->distrito}}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Año:</b> {{ $cliente->tipo_cliente}}
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
                title: 'El cliente se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El cliente se registró con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'show')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Detalles de cliente',
            })
        </script>
    @endif
@stop
