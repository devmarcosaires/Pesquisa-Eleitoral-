<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastro /</span> Mandatos</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Mandatos</h5>
            @can('users_create')
                <a class="btn btn-primary btn-sm" href="{{ route('mandates.create') }}">Adicionar Novo</a>
            @endcan
        </div>
        <div class="card-body">
            <x-alerts />
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ativo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mandates as $mandate)
                            <tr>
                                <td>{{ $mandate->name }}</td>
                                <td>{{ $mandate->active ? 'Sim' : 'Não' }}</td>
                                <td>

                                <form action="{{ route('mandates.destroy', $mandate->id) }}" method="POST"
                                        class="delete" id="form-delete-{{ $mandate->id }}">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle me-1" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i> </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('mandates.show', $mandate->id) }}">Visualizar</a>   
                                                @can('users_edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('mandates.edit', $mandate->id) }}">Editar</a>
                                                @endcan
                                                @can('users_delete')
                                                    <a class="dropdown-item btn-delete" data-id="{{ $mandate->id }}"
                                                        href="#">Excluir</a>
                                                @endcan
                                      
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
