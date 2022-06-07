@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.create') }}" class="btn btn-primary float-right text-nowrap">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista De Ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <div>
                {{ $ventas->links() }}
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
                    @foreach ($ventas as $venta)
                        <tr>
                            <td width="20px">{{ $loop->iteration }}</td>
                            <td>{{ $venta->getFechaRegistro() }}
                            </td>
                            <td>{{ $venta->personal->nom_personal }} {{ $venta->personal->ape_paterno }}</td>
                            <td>{{ $venta->cliente->ruc }} <br> {{ $venta->cliente->razon_social }} </td>
                            <td>{{ $venta->sec }}</td>
                            <td>{{ $venta->sot }}</td>
                            <td>{{ $venta->tipo_contrato === 'V' ? 'Virtual' : 'Fisico' }}</td>
                            <td id="avance_oportunidad">{{ $venta->avance_oportunidad }}%</td>
                            <td width="260px">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{ route('admin.ventas.show', $venta) }}"
                                        class="btn btn-sm btn-info text-nowrap">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                        <a href="{{ route('admin.ventas.tracking', $venta) }}"
                                        class="btn btn-sm btn-info text-nowrap" id="Seguimiento"
                                        <?php if ($venta->avance_oportunidad !== 100){ ?> style="display: none;" <?php   } ?>>
                                        <i class="fas fa-eye"></i> Seguimiento
                                        </a>                                  
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- Nota: Creo que lo ideal es hacerlo en un apartado, no dentro del mismo codigo html, pero lo intente no habia podido
    Debido al tiempo se quedará así pero falta revisar esta parte. style="display: none;
     @section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#ver_avance_oportunidad').val('bye')
        });
        $(window).on("load", $('#ver_avance_oportunidad').val('bye'));
    </script>
@endsection --}}
