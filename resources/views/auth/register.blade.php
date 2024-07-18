<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - NeuroCursos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000000;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }
        .register-image {
            flex: 1;
            background: url('img/imagem3.png') no-repeat center center;
            background-size: cover;
        }
        .register-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .authentication-card {
            background-color: #1f1f1f;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.6);
            width: 100%;
            max-width: 500px;
        }
        .authentication-card-logo {
            margin-bottom: 1rem;
        }
        .authentication-card-logo img {
            width: 100px;
        }
        .form-control {
            background-color: #2c2c2c;
            border: none;
            color: #f0f0f0;
        }
        .form-control:focus {
            background-color: #2c2c2c;
            border-color: #a855f7;
            box-shadow: 0 0 5px rgba(168, 85, 247, 0.5);
            color: #f0f0f0;
        }
        .btn-primary {
            background-color: #a855f7;
            border-radius: 20px;
            color: #fff;
            border-color: #a855f7;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
            padding: 20px 30px;
        }
        .btn-primary:hover {
            background-color: #9333ea;
            border-color: #9333ea;
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .text-gray-600 {
            color: #b0b0b0;
        }
        .text-gray-600:hover {
            color: #a855f7;
        }
        .back-arrow {
            color: #a855f7;
            text-decoration: none;
            font-size: 1.5rem;
            position: absolute;
            top: 30px;
            left: 30px;
            transition: color 0.3s ease;
        }
        .back-arrow:hover {
            color: #9333ea;
        }
        .footer {
            background-color: #1a1a1a;
            color: #fff;
            padding: 1.5rem 0;
            position: relative;
            overflow: hidden;
        }
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(to right, transparent, #a855f7, transparent);
        }
        .footer h5 {
            color: #a855f7;
            margin-bottom: 1.5rem;
        }
        .footer ul {
            list-style-type: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 0.5rem;
        }
        .footer ul li a {
            color: #b0b0b0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer ul li a:hover {
            color: #a855f7;
        }
        .footer .social-icons a {
            color: #fff;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .footer .social-icons a:hover {
            color: #a855f7;
        }
        .copyright {
            margin-top: 1rem;
            text-align: center;
            color: #888;
        }
        @media (max-width: 768px) {
            .register-image {
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-arrow">&larr;</a>
    <div class="register-container">
        <div class="register-form">
            <div class="authentication-card">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Nome') }}" />
                        <x-input id="name" class="form-control mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="form-control mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                        <x-input id="password_confirmation" class="form-control mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('Eu concordo com os :terms_of_service e :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Termos de Serviço').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de Privacidade').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Já possui uma conta?') }}
                        </a>

                        <x-button class="ms-4 btn-primary">
                            {{ __('Cadastrar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="register-image"></div>
    </div>

    @include('layouts.footer')
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
