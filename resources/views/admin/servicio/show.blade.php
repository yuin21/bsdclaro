@extends('adminlte::page')

@section('title', 'Ver Servicio')

@section('content_header')
    <a href="{{ route('admin.servicio.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de servicios
    </a>
    <h1 class="text-bold">Ver Servicio</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre de Servicio:</b> {{ $servicio->nombre_servicio }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Servicio:</b> {{ $servicio->tipo_servicio }}
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
                title: 'El servicio se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El servicio se registró con éxito',
            })
        </script>
    @endif
@stop
