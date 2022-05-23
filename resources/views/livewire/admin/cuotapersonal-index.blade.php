<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.cuotapersonal.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por Apellido Paterno del Personal la Cuota">
    </div>
    @if ($bsd_cuota_personal->count())
        <div class="card-body">
            <div>
                {{ $bsd_cuota_personal->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Personal</th>
                            <th>Cuota</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Acciones</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_cuota_personal as $cuotapersonal)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $cuotapersonal->personal->ape_paterno }}
                                    {{ $cuotapersonal->personal->ape_materno }}
                                    {{ $cuotapersonal->personal->nom_personal }}</td>
                                <td>{{ $cuotapersonal->cuota->cuota }}</td>
                                <td>{{ $cuotapersonal->mes }}</td>
                                <td>{{ $cuotapersonal->año }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.cuotapersonal.show', $cuotapersonal) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.cuotapersonal.edit', $cuotapersonal) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.cuotapersonal.destroyLogico', $cuotapersonal) }}"
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
            <strong>Sin datos de las cuotas asignadas</strong>
        </div>
    @endif
</div>
