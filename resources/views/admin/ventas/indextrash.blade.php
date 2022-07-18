@extends('adminlte::page')

@section('title', 'Listado de las ventas')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Ventas Removidas</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_venta->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
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
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.ventas.restaurarVenta', $venta) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card-body">
                <strong>Sin registros</strong>
            </div>
        @endif
    </div>
@stop

@section('js')
    @if (session('success') === 'restaurar')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La venta se ha restaurado con éxito',
            })
        </script>
    @endif

    {{-- @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La venta se eliminó con éxito',
            })
        </script>
    @endif --}}

{{--
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Elija la opción Eliminar para confirmar.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script> --}}
@stop
