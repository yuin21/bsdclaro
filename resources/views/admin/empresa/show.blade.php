@extends('adminlte::page')

@section('title', 'Ver Empresa')

@section('content_header')
    <a href="{{ route('admin.empresa.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de empresas
    </a>
    <h1 class="text-bold">Ver Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Empresa: <span class="badge badge-warning">{{ $empresa->razon_social }}</span></h5>
            <a href="{{ route('admin.empresa.edit', $empresa) }}" class="btn btn-sm btn-success text-nowrap">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Ruc:</b> {{ $empresa->ruc }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Razón Social</b> {{ $empresa->razon_social }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Representante</b> {{ $empresa->representante }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Dirección</b> {{ $empresa->direccion}}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Celular</b> {{ $empresa->celular}}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Email</b> {{ $empresa->email}}
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
                title: 'La empresa se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La empresa se registró con éxito',
            })
        </script>
    @endif
@stop
