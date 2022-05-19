<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.empresa.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
    </div>
    @if ($bsd_empresa->count())
        <div class="card-body">            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>RUC</th>
                            <th>Razon Social</th>
                            <th>Representante</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_empresa as $empresa)
                            <tr>
                                <td>{{ $empresa->ruc }}</td>
                                <td>{{ $empresa->razon_social }}</td>
                                <td>{{ $empresa->representante }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->celular }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>{{ $empresa->estado }}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.empresa.show', $empresa) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.empresa.edit', $empresa) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.empresa.destroyLogico', $empresa) }}"
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
            <strong>Sin datos de empresas</strong>
        </div>
    @endif
</div>

