@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <a href="{{ route('admin.servicio.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de servicios
    </a>
    <h1 class="text-bold">Servicio Removido</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_servicio->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_servicio as $servicio)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $servicio->tiposervicio->nom_tipo_servicio }}</td>
                                    <td>{{ $servicio->nom_servicio }}</td>
                                    <td width="200px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.servicio.restaurarServicio', $servicio) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.servicio.destroy', $servicio) }}"
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
                title: 'El servicio se ha restaurado con ??xito',
            })
        </script>
    @endif

    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El servicio se elimin?? con ??xito',
            })
        </script>
    @endif


    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: '??Est??s seguro?',
                text: "Elija la opci??n Eliminar para confirmar.",
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
