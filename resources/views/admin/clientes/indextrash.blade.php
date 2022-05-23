@extends('adminlte::page')

@section('title', 'Listado de los clientes')

@section('content_header')
    <a href="{{ route('admin.clientes.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de clientes
    </a>
    <h1 class="text-bold">Clientes removidos</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_cliente->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Ruc</th>
                                <th>Razón social</th>
                                <th>Número de celular</th>
                                <th>Dirección</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Tipo de Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_cliente as $cliente)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $cliente->ruc }}</td>
                                <td>{{ $cliente->razon_social}}</td>
                                <td>{{ $cliente->num_celular}}</td>
                                <td>{{ $cliente->direccion}}</td>
                                <td>{{ $cliente->departamento}}</td>
                                <td>{{ $cliente->provincia}}</td>
                                <td>{{ $cliente->distrito}}</td>
                                <td>{{ $cliente->tipo_cliente}}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <form action="{{ route('admin.clientes.restaurarCliente', $cliente) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                <i class="fas fa-plus-circle"></i> Restaurar
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.clientes.destroy', $cliente) }}"
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
                <strong>Sin registros de cliente</strong>
            </div>
        @endif
    </div>
@stop

@section('js')
    @if (session('success') === 'restaurar')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El cliente se ha restaurado con éxito',
            })
        </script>
    @endif

    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El cliente se eliminó con éxito',
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
