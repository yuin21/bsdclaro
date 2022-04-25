<div class="card">
    <div class="card-header">
        <a class="btn btn-primary mb-2" href="{{ route('admin.personal.create') }}">Registrar</a>
        <a class="btn btn-info mb-2" href="{{ route('admin.personal.indextrash') }}">Removidos</a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por apellido paterno">
    </div>
    @if ($bsd_personal->count())
        <div class="card-footer">
            {{ $bsd_personal->links() }}
        </div>
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
                                    <a href="{{ route('admin.personal.edit', $personal) }}"
                                        class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <a href="{{ route('admin.personal.show', $personal) }}"
                                        class="btn btn-primary btn-sm">
                                        Ver
                                    </a>
                                    <form action="{{ route('admin.personal.destroyLogico', $personal) }}"
                                        class="d-inline" method="post">
                                        @csrf
                                        @method('PUT')
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
            <strong>Sin datos de personal</strong>
        </div>
    @endif
</div>
