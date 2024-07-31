<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar-brand:hover {
            color: #a855f7 !important;
            text-shadow: 0 0 10px #a855f7;
        }
        .form-section {
            padding: 5rem 0;
            background-color: #0f0f0f;
        }
        .form-container {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
        }
        .form-container h1 {
            color: #a855f7;
            margin-bottom: 2rem;
            text-align: center;
            text-shadow: 0 0 10px rgba(168, 85, 247, 0.7);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            color: #e0e0e0;
            margin-bottom: 0.5rem;
        }
        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            color: #fff;
        }
        .form-control:focus {
            background-color: #2a2a2a;
            border-color: #a855f7;
            box-shadow: 0 0 0 0.2rem rgba(168, 85, 247, 0.25);
            color: #fff;
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
        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            border-color: #198754;
            color: #75b798;
        }
        .image-preview {
            width: 100%;
            height: auto;
            max-height: 200px;
            margin-top: 1rem;
            display: none;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            display: none;
            color: #dc3545;
        }
        .form-control.is-invalid ~ .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>

    @include('layouts.nav')

    <div class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container">
                        <h1>Criar Curso</h1>

                        @if (session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form id="courseForm" action="{{ route('criar_curso') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Curso</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                                <div class="invalid-feedback">Nome do curso é obrigatório.</div>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
                                <div class="invalid-feedback">Descrição é obrigatória.</div>
                            </div>
                            <div class="form-group">
                                <label for="duracao">Duração (em horas)</label>
                                <input type="number" class="form-control" id="duracao" name="duracao" required>
                                <div class="invalid-feedback">Duração é obrigatória.</div>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco" required>
                                <div class="invalid-feedback">Preço é obrigatório.</div>
                            </div>
                            <div class="form-group">
                                <label for="imagem">Link da Imagem do Curso</label>
                                <input type="text" class="form-control" id="imagem" name="imagem" required>
                                <div class="invalid-feedback">Link da imagem é obrigatório.</div>
                                <img id="imagemPreview" class="image-preview" src="" alt="Imagem do Curso">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Adicionar Curso</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#imagem').on('input', function() {
                var url = $(this).val();
                if(url) {
                    $('#imagemPreview').attr('src', url).show();
                } else {
                    $('#imagemPreview').hide();
                }
            });

            $('#courseForm').on('submit', function(event) {
                var isValid = true;

                $('#courseForm input, #courseForm textarea').each(function() {
                    if(!$(this).val()) {
                        $(this).addClass('is-invalid');
                        isValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if(!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
