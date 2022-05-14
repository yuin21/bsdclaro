<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.cuotas.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por Personal la Cuota">
    </div>
    @if ($bsd_cuota->count())
        <div class="card-body">
            <div>
                {{ $bsd_cuota->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Tipo de Consultor</th>
                            <th>Tipo de Venta</th>
                            <th>Personal</th>
                            <th>Cantidad de Cuota</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_cuota as $cuota)
                            <tr>
                                <td>{{ $cuota->tipo_consultor }}</td>
                                <td>{{ $cuota->tipo_venta }}</td>
                                <td>{{ $cuota->personal }}</td>
                                <td>{{ $cuota->cantidad_cuota }}</td>
                                <td>{{ $cuota->mes }}</td>
                                <td>{{ $cuota->año }}</td>
                                <td>{{ $cuota->estado }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.cuotas.show', $cuota) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.cuotas.edit', $cuota) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.cuotas.destroyLogico', $cuota) }}"
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
            <strong>Sin datos de las cuotas</strong>
        </div>
    @endif
</div>
