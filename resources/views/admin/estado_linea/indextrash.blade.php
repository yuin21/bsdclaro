@extends('adminlte::page')

@section('title', 'Listado del estado_linea')

@section('content_header')
    <a href="{{ route('admin.estado_linea.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de estado_lineaes
    </a>
    <h1 class="text-bold">estado_linea Removido</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_estado_linea->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Tipo</th>
                                <th>Nombres</th>                               
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_estado_linea as $estado_linea)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $estado_linea->tiposervicio->nom_tipo_servicio }}</td>
                                    <td>{{ $estado_linea->nombre_estado_linea }}</td>                                    
                                    <td width="200px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.estado_linea.restaurarestadolinea', $estado_linea) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.estado_linea.destroy', $estado_linea) }}" class="form-delete"
                                                method="post">
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
                title: 'El estado línea se ha restaurado con éxito',
            })
        </script>
    @endif

    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El estado línea se eliminó con éxito',
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
