<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Usuários</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Usuários</h5>
            @can('users_create')
                <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">
                    Adicionar Novo</a>
            @endcan
        </div>
        <div class="card-body">
            <x-alerts />
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ insertMask($user->phone, '(99) 99999-9999') }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="delete" id="form-delete-{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle me-1" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('users.show', $user->id) }}">Visualizar</a>
                                                @can('users_edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('users.edit', $user->id) }}">Editar</a>
                                                @endcan
                                                @can('users_delete')
                                                    <a class="dropdown-item btn-delete" data-id="{{ $user->id }}"
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
