@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold">VENTAS ACTIVADAS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            MOVILES
        </div>
        @if ($bsd_pago->count())
            <div class="card-body table-responsive">
                <div>
                    {{ $bsd_pago->links() }}
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Consultores</th>
                            <th>Reno</th>
                            <th>C/IGV</th>
                            <th>S/IGV</th>
                            <th>Alta</th>
                            <th>Porta</th>
                            <th>N° Lineas</th>
                            <th>C/IGV Moviles</th>
                            <th>S/IGV Moviles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_pago as $pago)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $pago->cuotapersonal->personal->nom_personal }}
                                    {{ $pago->cuotapersonal->personal->ape_paterno }}
                                </td>
                                <td>{{ $pago->venta->total }}</td>
                                <td>{{ $pago->porcentaje_comision }} %</td>
                                <td>{{ $pago->comision_consultor}}</td>
                                <td>{{ $pago->estado_carpeta === 'C' ? 'Conforme' : 'No Conforme' }}</td>
                                <td>{{ $pago->pago_1er_recibo === 'S' ? 'Si' : 'No' }}</td>
                                <td>{{ $pago->pago_dace === 'S' ? 'Si' : 'No' }}</td>
                                <td>{{ $pago->abono_consultor === 'S' ? 'Si' : 'No' }}</td>
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
@stop
