<x-guest-layout>
    <h4 class="mb-2">Resetar a senha</h4>
    <p class="mb-4">Crie sua nova senha e acesso o sistema novamente</p>

    <x-alerts />

    <form method="POST" class="mb-3" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, [
                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="email"/>
        </div>

        <!-- Password -->
        <div class="mb-3">
            {{ Form::label('password', 'Senha') }}
            {{ Form::password('password', [
                    'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                    'required',
                ]) }}
            <x-input-error field="password" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            {{ Form::label('password_confirmation', 'Confirmar Senha') }}
            {{ Form::password('password_confirmation', [
                    'class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''),
                    'required',
                ]) }}
            <x-input-error field="password_confirmation" />
        </div>

            <x-primary-button>
                Resetar senha
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
