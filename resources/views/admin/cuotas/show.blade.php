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
        <div class="card-header d-flex flex-wrap justify-content-end align-items-center">
            <a href="{{ route('admin.cuotas.edit', $cuota) }}" class="btn btn-sm btn-success text-nowrap ml-2">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Cuota:</b> {{ number_format($cuota->cuota, 2) }}
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
