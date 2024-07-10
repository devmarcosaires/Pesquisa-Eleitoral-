

<div class="row mb-3">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('title', 'Nome') }}
            {{ Form::text('title', null, [
                'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="title" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('letter', 'Sigla') }}
            {{ Form::text('letter', null, [
                'class' => 'form-control' . ($errors->has('letter') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="letter" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('iso', 'Código IBGE') }}
            {{ Form::number('iso', null, [
                'class' => 'form-control' . ($errors->has('iso') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="iso" />
        </div>
    </div>
</div>
