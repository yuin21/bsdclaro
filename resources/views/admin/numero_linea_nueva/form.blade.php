<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.numero_linea_nueva.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
    </div>
    @if ($bsd_numero_linea_nueva->count())
        <div class="card-body">            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Detalle de la venta</th>
                            <th>Número de linea nueva</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_numero_linea_nueva as $numero_linea_nueva)
                            <tr>
                                <td>{{ $numero_linea_nueva->bsd_detalle_venta_id }}</td>
                                <td>{{ $numero_linea_nueva->numero_linea_nueva}}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.numero_linea_nueva.show', $numero_linea_nueva) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.numero_linea_nueva.edit', $numero_linea_nueva) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.numero_linea_nueva.destroyLogico', $numero_linea_nueva) }}"
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
            <strong>Sin datos de las lineas</strong>
        </div>
    @endif
</div>

