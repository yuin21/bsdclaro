@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <a href="{{ route('admin.personal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de personal
    </a>
    <h1 class="text-bold">Personal Removido</h1>
@stop

@section('content')
    <div class="card">
        @if ($bsd_personal->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Personal</th>
                                <th>Cargo</th>
                                <th>Tipo Per.</th>
                                <th>Tipo Doc.</th>
                                <th>Nro. Doc.</th>
                                <th>Direccion</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_personal as $personal)
                                <tr>
                                    <td width="20px">{{ $loop->iteration }}</td>
                                    <td>{{ $personal->ape_paterno }} {{ $personal->ape_materno }}
                                        {{ $personal->nom_personal }}
                                    </td>
                                    <td>{{ $personal->cargo }}</td>
                                    <td>{{ $personal->tipo_personal }}</td>
                                    <td>{{ $personal->tipo_doc_iden }}</td>
                                    <td>{{ $personal->nro_doc_iden }}</td>
                                    <td>{{ $personal->direccion }}</td>
                                    <td>{{ $personal->celular }}</td>
                                    <td>{{ $personal->email }}</td>
                                    <td width="200px">
                                        <div class="d-flex" style="gap: 10px">
                                            <form action="{{ route('admin.personal.restaurarPersonal', $personal) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-info text-nowrap">
                                                    <i class="fas fa-plus-circle"></i> Restaurar
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.personal.destroy', $personal) }}"
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
                title: 'El personal se ha restaurado con éxito',
            })
        </script>
    @endif

    @if (session('success') === 'destroy')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El personal se eliminó con éxito',
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
