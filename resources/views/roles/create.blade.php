<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gerenciamento /</span> Atribuições</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Atribuições</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'roles.store']) !!}
            @include('roles._form')
            <div class="row">
                <div class="col-12 d-flex justify-content-end mt-3">
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>
