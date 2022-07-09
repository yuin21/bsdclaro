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
        <div class="card-header">
            <a class="btn btn-info mb-2" href="{{ route('admin.ventas.indextrash') }}">
                <i class="fas fa-trash"></i> Anulados
            </a>
        </div>
        @if ($bsd_venta->count())
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
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.ventas.show', $venta) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.ventas.tracking', $venta) }}"
                                        class="btn btn-sm btn-info text-nowrap" id="Seguimiento"
                                        <?php if ($venta->avance_oportunidad >= 100){ ?> style="display: none;" <?php   } ?>>
                                            <i class="fas fa-eye"></i> Seguimiento
                                        </a>
                                        <form action="{{ route('admin.ventas.destroyLogico', $venta) }}"
                                            class="form-borrar" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-minus-circle"></i> Anular
                                                {{-- Remover  --}}
                                            </button>
                                        </form>
                                    </div>
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

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La venta se ha anulado con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a anular una venta',
                text: "Puede verlo y restaurarlo en la opción: Anulados",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@stop
