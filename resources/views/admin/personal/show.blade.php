@extends('adminlte::page')

@section('title', 'Ver Personal')

@section('content_header')
    <a href="{{ route('admin.personal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de personal
    </a>
    <h1 class="text-bold">Ver Personal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Personal: <span class="badge badge-warning">{{ $personal->ape_paterno }}
                    {{ $personal->ape_materno }} {{ $personal->nom_personal }}</span></h5>


            <form action="{{ route('admin.personal.generatePDF', $personal) }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                    <i class="fas fa-file-pdf"></i> PDF
                </button>
            </form>
            <a href="{{ route('admin.personal.edit', $personal) }}" class="btn btn-sm btn-success text-nowrap ml-2">
                <i class="fas fa-pen"></i> Editar
            </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Nombre:</b> {{ $personal->nom_personal }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Apellido Materno:</b> {{ $personal->ape_paterno }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Apellido Paterno:</b> {{ $personal->ape_materno }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Cargo:</b> {{ $personal->cargo }}
                </li>
                <li class="list-group-item">
                    <b style="min-width: 200px; display: inline-block">Tipo de
                        Personal:</b>{{ $personal->tipo_personal }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Tipo de Documento:</b>
                    ({{ $personal->tipo_doc_iden }})
                    @foreach ($tipos_doc as $tipo)
                        @if ($tipo->cod === $personal->tipo_doc_iden)
                            {{ $tipo->name }}
                        @endif
                    @endforeach
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Número de Documento:</b>
                    {{ $personal->nro_doc_iden }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Dirección:</b> {{ $personal->direccion }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Celular:</b> {{ $personal->celular }}
                </li>
                <li class="list-group-item">
                    <b style="min-width:200px; display: inline-block">Correo:</b> {{ $personal->email }}
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
                title: 'El personal se editó con éxito',
            })
        </script>
    @endif
    @if (session('success') == 'store')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El personal se registró con éxito',
            })
        </script>
    @endif
@stop
