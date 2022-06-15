<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.estado_linea.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por Nombre de estado línea">
    </div>
    @if ($bsd_estado_linea->count())
        <div class="card-body">
            <div>
                {{ $bsd_estado_linea->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_estado_linea as $estado_linea)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $estado_linea->tiposervicio->nom_tipo_servicio }}</td>
                                <td>{{ $estado_linea->nombre_estado_linea }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.estado_linea.show', $estado_linea) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                            {{-- Ver  --}}
                                        </a>
                                        <a href="{{ route('admin.estado_linea.edit', $estado_linea) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                            {{-- Editar --}}
                                        </a>
                                        <form action="{{ route('admin.estado_linea.destroyLogico', $estado_linea) }}"
                                            class="form-borrar" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-minus-circle"></i> Remover
                                                {{-- Remover --}}
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
            <strong>Sin Registros</strong>
        </div>
    @endif
</div>
