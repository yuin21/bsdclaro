@extends('adminlte::page')

@section('title', 'Ver Plan')

@section('content_header')
    <a href="{{ route('admin.plan.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de planes
    </a>
    <h1 class="text-bold">Ver Plan</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Servicio:</b> {{ $plan->tiposervicio->nom_tipo_servicio }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre de Plan:</b> {{ $plan->nombre_plan }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Precio:</b> {{ $plan->precio }}
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
                title: 'El plan se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El plan se registró con éxito',
            })
        </script>
    @endif
@stop
