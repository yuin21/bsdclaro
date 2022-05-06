@extends('adminlte::page')

@section('title', 'Ver Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas
    </a>
    <h1 class="text-bold">Ver Cuotas</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Consultor:</b> {{ $cuota->tipo_consultor }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Venta:</b> {{ $cuota->tipo_venta }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Personal:</b> {{ $cuota->personal }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Cantidad de Cuota:</b> {{ $cuota->cantidad_cuota }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Mes:</b> {{ $cuota->mes }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Año:</b> {{ $cuota->año }}
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
                title: 'La cuota se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La cuota se registró con éxito',
            })
        </script>
    @endif
@stop
