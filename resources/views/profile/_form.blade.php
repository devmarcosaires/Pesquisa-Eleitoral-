<div class="row">
    <div class="col-md-12 mb-3">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, [
                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="name" />
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, [
                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="email" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('phone', 'Telefone') }}
            {{ Form::text('phone', null, [
                'class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''),
                'required',
                'data-mask' => 'phone',
            ]) }}
            <x-input-error field="phone" />
        </div>
    </div>
</div>
