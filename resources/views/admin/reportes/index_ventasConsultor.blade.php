@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ventas por Consultar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.reportes.searchConsultor']) !!}
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    {!! Form::label('fecha_registro', 'Fecha Registro', ['class' => 'text-nowrap']) !!}
                    {!! Form::date('fecha_registro', isset($request) ? $request->fecha_registro : null, ['class' => 'form-control', 'id' => 'fecha_conforme']) !!}
                    @error('fecha_registro')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-6">
                    {!! Form::label('estado_venta', 'Estado') !!}
                    {!! Form::select('estado_venta', ['P' => 'Pendiente', 'E' => 'Enviado', 'C' => 'Conforme', 'N' => 'No Conforme'], isset($request) ? $request->estado_venta : null, ['class' => 'selectpicker form-control']) !!}
                    @error('estado_venta')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-6">
                    {!! Form::label('personal', 'Personal') !!}
                    {!! Form::select('personal', $personal, isset($request) ? $request->personal : null, ['class' => 'selectpicker form-control']) !!}
                    @error('personal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-4 float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2 class="h5 text-center">RESULTADOS</h2>
        </div>
        <div class="card-body">
            @if (isset($bsd_venta) && $bsd_venta->count())
                <div class="card-body table-responsive">
                    <div>
                        {{ $bsd_venta->links() }}
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="border">
                            <tr>
                                <th>Item</th>
                                <th>Fecha</th>
                                <th>Personal</th>
                                <th>Cliente</th>
                                <th>SEC</th>
                                <th>SOT</th>
                                <th>Tipo de contrato</th>
                                <th>Est. Avance</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_venta as $venta)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $venta->getFechaRegistro() }}
                                    </td>
                                    <td>{{ $venta->personal->nom_personal }} {{ $venta->personal->ape_paterno }}</td>
                                    <td>{{ $venta->cliente->ruc }} <br> {{ $venta->cliente->razon_social }} </td>
                                    <td>{{ $venta->sec }}</td>
                                    <td>{{ $venta->sot }}</td>
                                    <td>{{ $venta->tipo_contrato === 'D' ? 'Digital' : 'Fisico' }}</td>
                                    <td id="avance_oportunidad">{{ $venta->avance_oportunidad }}%</td>
                                    <td width="260px">
                                        <form action="{{ route('admin.reportes.generatePDF', $venta) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card-body">
                    <strong>Sin Registros</strong>
                </div>
            @endif
        </div>
    </div>
@stop
