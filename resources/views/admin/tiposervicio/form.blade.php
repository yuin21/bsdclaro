<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.tiposervicio.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
    </div>
    @if ($bsd_tiposervicio->count())
        <div class="card-body">            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Nombre de Tipo de Servicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_tiposervicio as $tiposervicio)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $tiposervicio->nom_tipo_servicio }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.tiposervicio.show', $tiposervicio) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.tiposervicio.edit', $tiposervicio) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.tiposervicio.destroyLogico', $tiposervicio) }}"
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
            <strong>Sin datos de los tipos de servicios</strong>
        </div>
    @endif
</div>

