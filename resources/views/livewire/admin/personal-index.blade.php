@if (Session::has('mensaje'))
    <div class="alert alert-success mb-2" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" style="color:white; opacity: initial" data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary mb-2" href="{{ route('admin.personal.create') }}">Registrar</a>
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
                                <td class="d-flex flex-wrap" style="gap: 5px;">
                                    <a href="{{ route('admin.personal.edit', $personal->id_personal) }}"
                                        class="btn btn-warning">
                                        Editar
                                    </a>

                                    <a href="{{ url('/admin/personal/' . $personal->id_personal) }}"
                                        class="btn btn-primary">
                                        Ver
                                    </a>
                                    <form action="{{ url('/admin/personal/' . $personal->id_personal) }}"
                                        class="d-inline" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar"
                                            class="btn btn-danger">
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
