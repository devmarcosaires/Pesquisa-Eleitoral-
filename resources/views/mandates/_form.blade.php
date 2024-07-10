<div class="row">
    <div class="col-md-8 mb-3">
        <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
            <x-input-error field="name" />
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
        {{ Form::label('active', 'Ativo') }}
        {{ Form::select('active', ['1' => 'Sim', '0' => 'Não'], null, ['class' => 'form-select', 'required']) }}
        <x-input-error field="ativo" />
        </div>
    </div>
</div>
