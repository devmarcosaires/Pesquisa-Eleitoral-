<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastros /</span> Cidades</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Cidades</h5>
            @can('cities_create')
                <a class="btn btn-primary btn-sm" href="{{ route('cities.create') }}">
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
                            <th>Estado</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cities as $city)
                            <tr>
                                <td>{{ $city->title }}</td>
                                <td>{{ $city->state->title }}</td>
                                <td>
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="POST"
                                        class="delete" id="form-delete-{{ $city->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle me-1" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i> </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('cities.show', $city->id) }}">Visualizar</a>
                                                @can('cities_edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('cities.edit', $city->id) }}">Editar</a>
                                                @endcan
                                                @can('cities_delete')
                                                    <a class="dropdown-item btn-delete" data-id="{{ $city->id }}"
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
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
