<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Atribuições</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Atribuições</h5>
            @can('roles_create')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">
                    Adicionar Novo</a>
            @endcan
        </div>
        <div class="card-body">
            <x-alerts />
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-hover">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Alias</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        class="delete" id="form-delete-{{ $role->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle me-1" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('roles.show', $role->id) }}">Visualizar</a>
                                                @can('roles_edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                                @endcan
                                                @can('roles_delete')
                                                    <a class="dropdown-item btn-delete" data-id="{{ $role->id }}"
                                                        href="#">Excluir</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <x-list-empty />
                        @endforelse
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
