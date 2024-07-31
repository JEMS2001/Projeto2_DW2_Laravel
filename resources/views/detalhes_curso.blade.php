<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $curso->nome }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .form-control {
            background-color: #0f0f0f;
            color: #e0e0e0;
            border: 1px solid #3c006b;
        }
        .form-control:focus {
            border-color: #a855f7;
            box-shadow: 0 0 5px rgba(168, 85, 247, 0.5);
        }
        .form-group label {
            color: #e0e0e0;
        }
        .btn-primary {
            background-color: #a855f7;
            border-color: #a855f7;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
        }
        .btn-primary:hover {
            background-color: #9333ea;
            border-color: #9333ea;
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(40, 167, 69, 0.8);
        }
        .course-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-start;
            animation: fadeIn 1s ease-in-out;
            padding: 50px;
            border-radius: 10px;
            background-color: #1a0033;
            margin-bottom: 40px;
        }
        .course-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.6);
            transition: all 0.3s ease;
        }
        .course-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(168, 85, 247, 0.8);
        }
        .course-info {
            margin-left:10px ;
            flex: 1;
            min-width: 300px;
        }
        .course-info h2, .course-info p {
            margin-bottom: 20px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container mt-5">
        <h1 class="mb-4 text-center">{{ $curso->nome }}</h1>
        <div class="course-content">
            <div class="course-image col-md-6">
                <img src="{{ $curso->imagem }}" alt="{{ $curso->nome }}">
            </div>
            <div class="course-info col-md-6">
                <h2>{{ $curso->nome }}</h2>
                <p>{{ $curso->descricao }}</p>
                <p>Duração: {{ $curso->duracao }} horas</p>
                <p>Preço: R$ {{ $curso->preco }}</p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @else
                    <form action="{{ route('curso.inscrever', $curso->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Inscrever-se</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
