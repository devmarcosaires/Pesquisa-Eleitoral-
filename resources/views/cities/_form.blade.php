

<div class="row mb-3">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            {{ Form::label('title', 'Nome') }}
            {{ Form::text('title', null, [
                'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="title" />
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            {{ Form::label('iso_ddd', 'DDD') }}
            {{ Form::number('iso_ddd', null, [
                'class' => 'form-control' . ($errors->has('iso_ddd') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="iso_ddd" />
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            {{ Form::label('iso', 'Código IBGE') }}
            {{ Form::number('iso', null, [
                'class' => 'form-control' . ($errors->has('iso') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="iso" />
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            {{ Form::label('lat', 'Latitude') }}
            {{ Form::text('lat', null, [
                'class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="lat" />
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-group">
            {{ Form::label('long', 'Longitude') }}
            {{ Form::text('long', null, [
                'class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="long" />
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            {{ Form::label('state_id', 'Estado') }}
            {{ Form::select('state_id', $states->pluck('title', 'id')->all(), null, [
                'class' => 'form-select' . ($errors->has('state_id') ? ' is-invalid' : ''),
                'required',
                'placeholder' => 'Selecione'
            ]) }}
            <x-input-error field="state_id" />
        </div>
    </div>
</div>
