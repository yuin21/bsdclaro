<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.plan.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text" placeholder="Busque por Nombre de Plan">
    </div>
    @if ($bsd_plan->count())
        <div class="card-body">
            <div>
                {{ $bsd_plan->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>Item</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th style='text-align:center'>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bsd_plan as $plan)
                            <tr>
                                <td width="20px">{{ $loop->iteration }}</td>
                                <td>{{ $plan->tiposervicio->nom_tipo_servicio }}</td>
                                <td>{{ $plan->nombre_plan }}</td>
                                <td style='text-align:center'>
                                    {{ number_format($plan->precio, 2) }}
                                </td>
                                <td width="270px">
                                    <div class="d-flex" style="gap: 10px">
                                        <a href="{{ route('admin.plan.show', $plan) }}"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <i class="fas fa-eye"></i> Ver
                                            {{-- Ver  --}}
                                        </a>
                                        <a href="{{ route('admin.plan.edit', $plan) }}"
                                            class="btn btn-success btn-sm text-nowrap">
                                            <i class="fas fa-pen"></i> Editar
                                            {{-- Editar --}}
                                        </a>
                                        <form action="{{ route('admin.plan.destroyLogico', $plan) }}"
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
