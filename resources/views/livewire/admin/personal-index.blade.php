<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.personal.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <div class="float-right">
            <form action="{{ route('admin.personal.pdf.allpersonal') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                    <i class="fas fa-file-pdf"></i> PDF
                </button>
            </form>
        </div>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por apellido paterno">
    </div>
    @if ($bsd_personal->count())
        <div class="card-body">
            <div>
                {{ $bsd_personal->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Personal</th>
                            <th>cargo</th>
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
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        {{-- <form action="{{ route('admin.personal.generatePDF', $personal) }}"
                                            method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </button>
                                        </form> --}}
                                        <a href="{{ route('admin.personal.show', $personal) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.personal.edit', $personal) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.personal.destroyLogico', $personal) }}"
                                            class="form-borrar" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-minus-circle"></i> Remover
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
            <strong>Sin datos de personal</strong>
        </div>
    @endif
</div>
