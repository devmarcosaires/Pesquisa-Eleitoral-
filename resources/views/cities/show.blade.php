<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastros /</span> Cidades</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Cidades</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $city->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Sigla: </strong></p>
                                <p class="card-text">
                                    {{ $city->letter }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>DDD: </strong></p>
                                <p class="card-text">
                                    {{ $city->iso_ddd }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Código IBGE: </strong></p>
                                <p class="card-text">
                                    {{ $city->iso }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Latitude: </strong></p>
                                <p class="card-text">
                                    {{ $city->lat }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Longitude: </strong></p>
                                <p class="card-text">
                                    {{ $city->long }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Estado: </strong></p>
                                <p class="card-text">
                                    {{ $city->state->title }}
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
                                    {{ $city->created_at ? $city->created_at->diffForHumans() : null }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Atualização: </strong></p>
                                <p class="card-text">
                                    {{ $city->updated_at ? $city->updated_at->diffForHumans() : null }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('cities.index') }}" class="btn btn-primary me-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
