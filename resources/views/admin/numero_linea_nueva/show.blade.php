@extends('adminlte::page')

@section('title', 'Ver Linea nueva')

@section('content_header')
    <a href="{{ route('admin.numero_linea_nueva.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Lineas nuevas
    <h1 class="text-bold">Ver Lineas</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Número de Lineas</b> {{ $numero_linea_nueva->numero_linea_nueva }}
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
                title: 'La linea se edito con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La linea se registró con éxito',
            })
        </script>
    @endif
@stop
