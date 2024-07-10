<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Minha Conta</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Minha Conta</h5>
        </div>
        <div class="card-body">
            <x-alerts />
            {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'PUT', 'files' => true]) !!}
            @include('profile._form')
            <div class="row">
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>
