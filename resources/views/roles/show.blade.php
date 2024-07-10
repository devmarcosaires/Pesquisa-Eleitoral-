<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Atribuições</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Atribuições</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Descrição: </strong></p>
                                <p class="card-text">
                                    {{ $role->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Alias: </strong></p>
                                <p class="card-text">
                                    {{ $role->name }}
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
                                    {{ $role->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Atualização: </strong></p>
                                <p class="card-text">
                                    {{ $role->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary me-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
