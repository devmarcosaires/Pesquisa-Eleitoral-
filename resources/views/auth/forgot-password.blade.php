<x-guest-layout>
    <h4 class="mb-2">Esqueceu sua senha?</h4>
    <p class="mb-4">Digite seu e-mail e enviaremos instruções para redefinir sua senha</p>
    <!-- Session Status -->
    <x-alerts />

    <form method="POST" class="mb-3" action="{{ route('password.email') }}">
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
        <x-primary-button>
           Enviar link de redefinição de senha
        </x-primary-button>
    </form>
</x-guest-layout>
