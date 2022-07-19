<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.clientes.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque el cliente">
    </div>
    @if ($bsd_cliente->count())
        <div class="card-body">
            <div>
                {{ $bsd_cliente->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Ruc</th>
                            <th>Razón social</th>
                            <th>Número de celular</th>
                            <th>Dirección</th>
                            <th>Departamento</th>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Tipo de Cliente</th>
                            <th>Acciones</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_cliente as $cliente)
                            <tr>
                                <td>{{$bsd_cliente->perPage()*($bsd_cliente->currentPage()-1)+$loop->iteration}}</td>
                                <td>{{ $cliente->ruc }}</td>
                                <td>{{ $cliente->razon_social}}</td>
                                <td>{{ $cliente->num_celular}}</td>
                                <td>{{ $cliente->direccion}}</td>
                                <td>{{ $cliente->departamento}}</td>
                                <td>{{ $cliente->provincia}}</td>
                                <td>{{ $cliente->distrito}}</td>
                                <td>{{ $cliente->tipo_cliente}}</td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.clientes.show', $cliente) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.clientes.edit', $cliente) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i>Editar

                                        </a>
                                        <form action="{{ route('admin.clientes.destroyLogico', $cliente) }}"
                                            class="form-borrar" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                                <i class="fas fa-minus-circle"></i>Remover

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
            <strong>Sin registros</strong>
        </div>
    @endif
</div>
