<x-guest-layout>

    <h4 class="mb-2">Login</h4>
    <p class="mb-4">Bem vindo de volta! Faça login com seu e-mail.</p>

    <!-- Session Status -->
    <x-alerts />

    <form method="POST" class="mb-3" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, [
                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="email" />
        </div>

        <!-- Password -->
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                {{ Form::label('password', 'Senha') }}
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    <small>Esqueceu a senha?</small>
                </a>
                @endif
            </div>
            <div class="input-group input-group-merge">
                {{ Form::password('password', [
                    'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                    'required',
                ]) }}
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <x-input-error field="password" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Lembar-me </label>
            </div>
        </div>

        <div class="mb-3">
            <x-primary-button class="ml-3">
               Entrar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
