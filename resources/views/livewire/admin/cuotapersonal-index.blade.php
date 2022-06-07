<div class="card">
    <div class="card-header">
        <a class="btn btn-info mb-2" href="{{ route('admin.cuotapersonal.indextrash') }}">
            <i class="fas fa-trash"></i> Removidos
        </a>
        <input wire:model="search" class="form-control" type="text"
            placeholder="Busque por Apellido Paterno del Personal la Cuota">
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cuotapersonal->personal->ape_paterno }}
                                    {{ $cuotapersonal->personal->ape_materno }}
                                    {{ $cuotapersonal->personal->nom_personal }}</td>
                                <td style="text-align: right">{{ number_format($cuotapersonal->cuota->cuota, 2) }}</td>
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
                                        <form
                                            action="{{ route('admin.cuotapersonal.destroyLogico', $cuotapersonal) }}"
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

{{-- @section('css')
    <style>
        table tr th {
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .sorting {
            background-color: #D4D4D4;
        }

        .asc:after {
            content: ' ↑';
        }

        .desc:after {
            content: " ↓";
        }

    </style>
@endsection

@section('js')
    <script>
        $('th').click(function() {
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc
            if (!this.asc) {
                rows = rows.reverse()
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i])
            }
            setIcon($(this), this.asc);
        })

        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index),
                    valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
            }
        }

        function getCellValue(row, index) {
            return $(row).children('td').eq(index).html()
        }

        function setIcon(element, asc) {
            $("th").each(function(index) {
                $(this).removeClass("sorting");
                $(this).removeClass("asc");
                $(this).removeClass("desc");
            });
            element.addClass("sorting");
            if (asc) element.addClass("asc");
            else element.addClass("desc");
        }
    </script>
@endsection --}}
