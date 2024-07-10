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
    <div class="col-md-3 mb-3">
        <div class="form-group">
            {{ Form::label('phone', 'Telefone') }}
            {{ Form::text('phone', null, [
                'class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''),
                'required',
                'data-mask' => 'phone'
            ]) }}
            <x-input-error field="phone" />
        </div>
    </div>
    <div class="col-md-9 mb-3">
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, [
                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="email" />
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-group">
            {{ Form::label('roles[]', 'Atribuição') }}
            {{ Form::select('roles[]', $roles->pluck('description', 'id')->all(), null, [
                'class' => 'form-select select2' . ($errors->has('roles[]') ? ' is-invalid' : ''),
                'required',
                'multiple'
            ]) }}
            <x-input-error field="roles[]" />
        </div>
    </div>
    @if(!isset($user))
    <div class="col-md-6 mb-3">
        <div class="form-group">
            {{ Form::label('password', 'Senha') }}
            {{ Form::password('password', [
                'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                'required'
            ]) }}
            <x-input-error field="password" />
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirmar Senha') }}
            {{ Form::password('password_confirmation', [
                'class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''),
                'required'
            ]) }}
        </div>
    </div>
    @endif
</div>

