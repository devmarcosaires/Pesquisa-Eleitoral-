<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastros /</span> Estados</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Estados</h5>
            @can('states_create')
                <a class="btn btn-primary btn-sm" href="{{ route('states.create') }}">
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
                            <th>Sigla</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($states as $state)
                            <tr>
                                <td>{{ $state->title }}</td>
                                <td>{{ $state->letter }}</td>
                                <td>
                                    <form action="{{ route('states.destroy', $state->id) }}" method="POST"
                                        class="delete" id="form-delete-{{ $state->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle me-1" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('states.show', $state->id) }}">Visualizar</a>
                                                @can('states_edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('states.edit', $state->id) }}">Editar</a>
                                                @endcan
                                                @can('states_delete')
                                                    <a class="dropdown-item btn-delete" data-id="{{ $state->id }}"
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
                {{ $states->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
