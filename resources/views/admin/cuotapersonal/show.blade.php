@extends('adminlte::page')

@section('title', 'Ver Cuota Asignada')

@section('content_header')
    <a href="{{ route('admin.cuotapersonal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas asignadas
    </a>
    <h1 class="text-bold">Ver Cuotas Asignadas</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Personal:</b> {{ $cuotapersonal->personal->ape_paterno }}
                    {{ $cuotapersonal->personal->ape_materno }} {{ $cuotapersonal->personal->nom_personal }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Cuota:</b> {{ $cuotapersonal->cuota->cuota }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Mes:</b> {{ $cuotapersonal->mes }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Año:</b> {{ $cuotapersonal->año }}
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
