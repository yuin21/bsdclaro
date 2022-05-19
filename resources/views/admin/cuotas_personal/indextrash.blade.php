@extends('adminlte::page')

@section('title', 'Listado de las cuotas')

@section('content_header')
    <a href="{{ route('admin.cuotas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas
    </a>
    <h1 class="text-bold">Cuota Removida</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_cuota->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo de Consultor</th>
                                <th>Tipo de Venta</th>
                                <th>Personal</th>
                                <th>Cantidad de Cuota</th>
                                <th>Mes</th>
                                <th>Año</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_cuota as $cuota)
                                <tr>
                                    <td>{{ $cuota->tipo_consultor }}</td>
                                    <td>{{ $cuota->tipo_venta }}</td>
                                    <td>{{ $cuota->personal }}</td>
                                    <td>{{ $cuota->cantidad_cuota }}</td>
                                    <td>{{ $cuota->mes }}</td>
                                    <td>{{ $cuota->año }}</td>
                                    <td>{{ $cuota->estado }}</td>
                                    <td width="200px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.cuotas.restaurarCuotas', $cuota) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.cuotas.destroy', $cuota) }}"
                                                class="form-delete" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                    <i class="fas fa-minus-circle"></i> Eliminar
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
                title: 'La cuota se ha restaurado con éxito',
            })
        </script>
    @endif

    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La cuota se eliminó con éxito',
            })
        </script>
    @endif


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
    </script>
@stop
