<x-app-layout>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cadastos /</span> Mandatos</h4>

    <div class="card">
        <div class="card-header d-flex flex-row align-items-start justify-content-between">
            <h5 class="card-title">Mandatos</h5>
        </div>
        <div class="card-body">
        {!! Form::open(['route' => 'mandates.store', 'method' => 'post']) !!}
        @include('mandates._form') 
        <div class="row">
            <div class="col-12 d-flex justify-content-end mt-3">
                <a href="{{ route('mandates.index') }}" class="btn btn-secondary me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
          {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>
