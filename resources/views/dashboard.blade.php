<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your provided CSS styles here */
        body {
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1rem;
            box-shadow: 0 0 15px rgba(128, 0, 255, 0.7);
        }
        .navbar-nav {
            margin-left: auto;
        }
        .nav-item {
            margin-left: 1rem;
        }
        .nav-link {
            color: #fff !important;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #a855f7;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #a855f7 !important;
            text-shadow: 0 0 5px #a855f7;
        }
        .nav-link:hover:before {
            width: 100%;
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar-brand:hover {
            color: #a855f7 !important;
            text-shadow: 0 0 10px #a855f7;
        }
        .courses-section {
            padding: 5rem 0;
            background-color: #0f0f0f;
        }
        .course-card {
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
            opacity: 0;
            transform: translateY(20px);
        }
        .course-card.animate {
            animation: fadeInUp 0.6s ease forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.5);
        }
        .course-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .course-card .card-body {
            padding: 1.5rem;
        }
        .course-card .card-title {
            color: #a855f7;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .course-card .card-text {
            color: #e0e0e0;
            margin-bottom: 1.5rem;
        }
        .course-card .btn-outline-light {
            border-color: #a855f7;
            color: #a855f7;
            transition: all 0.3s ease;
        }
        .course-card .btn-outline-light:hover {
            background-color: #a855f7;
            color: #fff;
        }
    </style>
</head>
<body>
    
    @include('layouts.nav')

    <div class="courses-section">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #a855f7;">Cursos Disponíveis</h2>
            @if ($cursos->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
                    <div class="alert alert-warning text-center" style="background-color: #333; color: #e0e0e0; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                        Você ainda não possui nenhum curso cadastrado.
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($cursos as $curso)
                        <div class="col-md-4 mb-4">
                            <div class="course-card">
                                <img src="{{ $curso->imagem }}" alt="{{ $curso->nome }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->nome }}</h5>
                                    <p class="card-text">{{ Str::limit($curso->descricao, 100) }}</p>
                                    <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-outline-light">Acessar Curso</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @include('layouts.footer', ['footer_class' => 'footer'])
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation for course cards
        document.addEventListener('DOMContentLoaded', (event) => {
            const cards = document.querySelectorAll('.course-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate');
                }, index * 100);
            });
        });
    </script>
</body>
</html>
