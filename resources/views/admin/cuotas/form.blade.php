<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.cuotas.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
    </div>
    @if ($bsd_cuota->count())
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Cuota</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_cuota as $cuota)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ number_format($cuota->cuota, 2) }}</td>
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
