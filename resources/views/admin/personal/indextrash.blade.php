@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <h1>Personal</h1>
@stop

@section('content')
    @include('alerts.success')
    <div class="card">
        @if ($bsd_personal->count())
            <div class="card-body" style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Personal</th>
                                <th>cargo</th>
                                <th>tipo Doc.</th>
                                <th>Nro. Doc.</th>
                                <th>direccion</th>
                                <th>celular</th>
                                <th>email</th>
                                <th>estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bsd_personal as $personal)
                                <tr>
                                    <td>{{ $personal->ape_paterno }} {{ $personal->ape_materno }}
                                        {{ $personal->nom_personal }}
                                    </td>
                                    <td>{{ $personal->cargo }}</td>
                                    <td>{{ $personal->tipo_doc_iden }}</td>
                                    <td>{{ $personal->nro_doc_iden }}</td>
                                    <td>{{ $personal->direccion }}</td>
                                    <td>{{ $personal->celular }}</td>
                                    <td>{{ $personal->email }}</td>
                                    <td>{{ $personal->estado }}</td>
                                    <td class="d-flex flex-wrap" style="gap: 5px; justify-content: end;">
                                        <form action="{{ route('admin.personal.restaurarPersonal', $personal) }}"
                                            class="d-inline" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="submit" value="Restaurar" class="btn btn-info btn-sm">
                                        </form>
                                        <form action="{{ route('admin.personal.destroy', $personal) }}"
                                            class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Borrar" class="btn btn-danger btn-sm">
                                        </form>
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
