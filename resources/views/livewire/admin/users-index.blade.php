<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text"
            placeholder="Ingrese el nombre o correo de un usuario para buscar">
    </div>
    @if ($users->count())
        <div class="card-body table-responsive">
            <div>
                {{ $users->links() }}
            </div>
            <table class="table table-bordered table-hover">
                <thead class="border">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td width="20px">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->roles->count())
                                <td>
                                    @foreach ($user->roles as $userrol)
                                        <span class="badge badge-secondary text-nowrap">
                                            {{ $userrol->name }}
                                        </span>
                                    @endforeach
                                </td>
                            @else
                                <td>
                                    <span class="badge badge-warning text-nowrap">
                                        Sin rol
                                    </span>
                                </td>
                            @endif
                            <td width="150px">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{ route('admin.users.show', $user) }}"
                                        class="btn btn-sm btn-info text-nowrap">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a class="btn btn-success btn-sm text-nowrap"
                                        href="{{ route('admin.users.edit', $user) }}">
                                        <i class="fas fa-pen"></i> Editar
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="form-delete text-nowrap">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-minus-circle"></i> Eliminar</button>
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
            <strong>No hay usuarios</strong>
        </div>
    @endif
</div>
