<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text"
            placeholder="Ingrese el nombre o correo de un usuario para buscar">
    </div>
    @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles[0]->name }}</td>
                            <td width="130px">
                                <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">
                                    Editar Rol
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay usuarios</strong>
        </div>
    @endif
</div>
