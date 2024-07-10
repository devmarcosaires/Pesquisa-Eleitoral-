<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastros /</span> Estados</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Estados</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $state->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Sigla: </strong></p>
                                <p class="card-text">
                                    {{ $state->letter }}
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
                                    {{ $state->created_at ? $state->created_at->diffForHumans() : null }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Atualização: </strong></p>
                                <p class="card-text">
                                    {{ $state->updated_at ? $state->updated_at->diffForHumans() : null }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('states.index') }}" class="btn btn-primary me-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
