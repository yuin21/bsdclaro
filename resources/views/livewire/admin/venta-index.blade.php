<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.ventas.indextrash') }}">
            <i class="fas fa-trash"></i> Anulados
        </a>
        <div class="row">
            <div class="col-lg-9 col-sm-6" >
                <input wire:model="search" class="form-control" type="text" placeholder="Busque por Personal">
            </div>
            <div class="col-lg-3 col-sm-6" >
                <input type="date" wire:model="searchFecha" class="form-control" placeholder="Busque por Fecha de Registro">
            </div>
        </div>

    </div>
    @if ($bsd_venta->count())
        <div class="card-body table-responsive">
            <div>
                {{ $bsd_venta->links() }}
            </div>
            <table class="table table-bordered table-hover">
                <thead class="border">
                    <tr>
                        <th>Item</th>
                        <th>Fecha</th>
                        <th>Personal</th>
                        <th>Cliente</th>
                        <th>SEC</th>
                        <th>SOT</th>
                        <th>Importe Sin IGV</th>
                        <th>Total</th>
                        <th>Est. Avance</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bsd_venta as $venta)
                        <tr>
                            <td width="20px">{{ $loop->iteration }}</td>
                            <td width="100px">{{ Carbon\Carbon::parse($venta->fecha_registro)->format('d/m/Y h:i A')}}</td>
                            <td>{{ $venta->nom_personal }} {{ $venta->ape_paterno }}</td>
                            <td>{{ $venta->ruc }} <br> {{ $venta->razon_social }} </td>
                            <td>{{ $venta->sec }}</td>
                            <td>{{ $venta->sot }}</td>
                            <td class="number">{{ number_format($venta->total_sin_igv,2) }}</td>
                            <td class="number">{{ number_format($venta->total,2) }}</td>
                            <td id="avance_oportunidad">{{ $venta->avance_oportunidad }}%</td>
                            <td width="260px">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{ route('admin.ventas.show', $venta->id) }}"
                                        class="btn btn-sm btn-info text-nowrap">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('admin.ventas.tracking', $venta->id) }}"
                                    class="btn btn-sm btn-info text-nowrap" id="Seguimiento"
                                    <?php if ($venta->avance_oportunidad >= 100){ ?> style="display: none;" <?php   } ?>>
                                        <i class="fas fa-eye"></i> Seguimiento
                                    </a>
                                    <form action="{{ route('admin.ventas.destroyLogico', $venta->id) }}"
                                        class="form-borrar" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                            <i class="fas fa-minus-circle"></i> Anular
                                            {{-- Remover  --}}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="card-body">
            <strong>Sin Registros</strong>
        </div>
    @endif
</div>
