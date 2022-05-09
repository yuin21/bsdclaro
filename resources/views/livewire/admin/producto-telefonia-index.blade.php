<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.productotelefonia.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por producto">
    </div>
    @if ($productos->count())
        <div class="card-body">
            <div>
                {{ $productos->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Servicio</th>
                            <th>Tipo de Servicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $producto->producto }}</td>
                                <td>{{ $producto->servicio->nombre_servicio }}</td>
                                <td>{{ $producto->servicio->tipo_servicio }}</td>
                                <td width="260px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.productotelefonia.show', $producto) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.productotelefonia.edit', $producto) }}"
                                            class="btn btn-sm btn-success text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.productotelefonia.destroyLogico', $producto) }}"
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
            <strong>Sin datos de producto telefonía</strong>
        </div>
    @endif
</div>
