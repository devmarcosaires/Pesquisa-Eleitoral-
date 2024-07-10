<!-- resources/views/mandates/show.blade.php -->

<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detalhes /</span> Mandato</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Detalhes do Mandato</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-1">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">{{ $mandate->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card m-1 ">
                        <div class="card-body">
                            <p><strong>Ativo: </strong></p>
                            <p class="card-text">
                            {{ $mandate->ativo ? 'Sim' : 'Não' }}
                            </p>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Criação: </strong></p>
                                <p class="card-text">
                                    {{ $mandate->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 ">
                            <div class="card-body">
                                <p><strong>Data de Atualização: </strong></p>
                                <p class="card-text">
                                    {{ $mandate->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Adicione mais blocos de código conforme necessário -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('mandates.index') }}" class="btn btn-primary me-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
