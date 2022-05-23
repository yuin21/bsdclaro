<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.servicio.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por Nombre de Servicio">
    </div>
    @if ($bsd_servicio->count())
        <div class="card-body">
            <div>
                {{ $bsd_servicio->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Tipo de Servicio</th>
                            <th>Nombre de Servicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_servicio as $servicio)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $servicio->tiposervicio->nom_tipo_servicio }}</td>
                                <td>{{ $servicio->nom_servicio }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.servicio.show', $servicio) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.servicio.edit', $servicio) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.servicio.destroyLogico', $servicio) }}"
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
            <strong>Sin datos de los servicios</strong>
        </div>
    @endif
</div>
