@extends('adminlte::page')

@section('title', 'Ver estado línea')

@section('content_header')
    <a href="{{ route('admin.estado_linea.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de estado_lineaes
    </a>
    <h1 class="text-bold">Ver Estados de las Líneas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Servicio:</b>
                    {{ $estado_linea->tiposervicio->nom_tipo_servicio }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre de Estado de las Líneas:</b> {{ $estado_linea->nombre_estado_linea }}
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
                title: 'El estado línea se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El estado línea se registró con éxito',
            })
        </script>
    @endif
@stop
