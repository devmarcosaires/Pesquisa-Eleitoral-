<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Usuários</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Usuários</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Email: </strong></p>
                                <p class="card-text">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Telefone: </strong></p>
                                <p class="card-text">
                                    {{ insertMask($user->phone, '(99) 99999-9999') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Atribuições: </strong></p>
                                <p class="card-text">
                                    {{ $user->roles->implode('description', ', ') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Criação: </strong></p>
                                <p class="card-text">
                                    {{ $user->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Atualização: </strong></p>
                                <p class="card-text">
                                    {{ $user->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('users.index') }}" class="btn btn-primary me-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
