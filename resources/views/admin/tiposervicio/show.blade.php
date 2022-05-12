@extends('adminlte::page')

@section('title', 'Ver Tipo de Servicio')

@section('content_header')
    <a href="{{ route('admin.tiposervicio.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de tipo de servicios
    </a>
    <h1 class="text-bold">Ver Tipo de Servicio</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre de Tipo de Servicio:</b> {{ $tiposervicio->nom_tipo_servicio }}
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
                title: 'El tipo de servicio se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El tipo de servicio se registró con éxito',
            })
        </script>
    @endif
@stop
