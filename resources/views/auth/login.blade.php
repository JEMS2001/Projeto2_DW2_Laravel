<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NeuroCursos</title>
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
        .login-container {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }
        .login-image {
            flex: 1;
            background: url('img/imagem1.png') no-repeat center center;
            background-size: cover;
        }
        .login-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .authentication-card {
            background-color: #1a1a1a;
            padding: 2.5rem; /* Increased padding for larger card */
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.6);
            width: 100%;
            max-width: 500px; /* Increased max-width for larger card */
        }
        .authentication-card-logo {
            margin-bottom: 1rem;
        }
        .authentication-card-logo img {
            width: 100px;
        }
        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            background-color: #333;
            border-color: #a855f7;
            box-shadow: 0 0 5px rgba(168, 85, 247, 0.5);
            color: #fff; /* Ensure the text color stays white */
        }
        .btn-primary {
            background-color: #a855f7;
            padding: 60px; /* Aumente o tamanho do botão */
            border-radius: 20px;
            color: #fff;
            border-color: #a855f7;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
        }
        .btn-primary:hover {
            background-color: #9333ea;
            border-radius: 20px;
            border-color: #9333ea;
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .text-gray-600 {
            color: #e0e0e0;
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
            background-color: #0a0a0a;
            color: #fff;
            padding: 1.5rem 0; /* Reduced padding for smaller footer */
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
            color: #e0e0e0;
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
            margin-top: 1rem; /* Reduced margin for smaller footer */
            text-align: center;
            color: #888;
        }
        
        @media (max-width: 768px) {
            .login-image {
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="/" class="back-arrow">&larr;</a>
    <div class="login-container">
        <div class="login-form">
            <div class="authentication-card">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Senha') }}" /> <!-- Traduzindo "Password" para "Senha" -->
                        <x-input id="password" class="form-control mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span> <!-- Traduzindo "Remember me" para "Lembrar-me" -->
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }} <!-- Traduzindo "Forgot your password?" para "Esqueceu sua senha?" -->
                            </a>
                        @endif

                        <x-button class="ms-4 btn-primary">
                            {{ __('Entrar') }} <!-- Traduzindo "Log in" para "Entrar" -->
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="login-image"></div>
    </div>

    @include('layouts.footer')
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
