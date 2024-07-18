<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .my_courses {
            padding: 5rem 0;
        }
        .card {
            background-color: #1a0033;
            color: #e0e0e0;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .btn-primary, .btn-danger, .btn-success {
            transition: all 0.3s ease;
        }
        .btn-primary:hover, .btn-danger:hover, .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.8);
        }
        .btn-success {
            background-color: #a855f7;
            border-color: #a855f7;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
        }
        .btn-success:hover {
            background-color: #9333ea;
            border-color: #9333ea;
        }
        .modal-content {
            background-color: #1a1a1a;
            color: #e0e0e0;
            border: none;
        }
        .modal-header, .modal-footer {
            border: none;
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
        .alert-warning {
            background-color: #333;
            color: #e0e0e0;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    
    <div class="my_courses">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Meus Cursos') }}</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Criar curso</button>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($cursos->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
                <div class="alert alert-warning text-center">
                    Você ainda não possui nenhum curso cadastrado.
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($cursos as $curso)
                    <div class="card col-md-3 mb-4">
                        <img src="{{ $curso->imagem }}" alt="{{ $curso->nome }}" class="card-img-top">
                        <div class="card-body">
                            <p>{{ $curso->nome }}</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $curso->id }}">Editar</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $curso->id }}">Deletar</button>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $curso->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $curso->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $curso->id }}">Editar Curso</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nome">Nome do Curso</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $curso->nome }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control" id="descricao" name="descricao" rows="4">{{ $curso->descricao }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="duracao">Duração (em horas)</label>
                                            <input type="number" class="form-control" id="duracao" name="duracao" value="{{ $curso->duracao }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="preco">Preço</label>
                                            <input type="text" class="form-control" id="preco" name="preco" value="{{ $curso->preco }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="imagem">Link da Imagem do Curso</label>
                                            <input type="text" class="form-control" id="imagem" name="imagem" value="{{ $curso->imagem }}" required>
                                            <img id="imagemPreview{{ $curso->id }}" src="{{ $curso->imagem }}" alt="Imagem do Curso" class="mt-3" style="width: 100%; display: block;">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Salvar alterações</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $curso->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $curso->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $curso->id }}">Deletar Curso</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza de que deseja deletar o curso "{{ $curso->nome }}"?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    </div>


    @include('layouts.footer')

    <!-- Create Course Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Criar Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('criar_curso') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome do Curso</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="duracao">Duração (em horas)</label>
                            <input type="number" class="form-control" id="duracao" name="duracao" required>
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" id="preco" name="preco" required>
                        </div>
                        <div class="form-group">
                            <label for="imagem">Link da Imagem do Curso</label>
                            <input type="text" class="form-control" id="imagem" name="imagem" required>
                            <img id="imagemPreviewCreate" src="" alt="Imagem do Curso" class="mt-3" style="width: 100%; display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Criar Curso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            @foreach ($cursos as $curso)
                $('#imagem').on('input', function() {
                    var imagemUrl = $(this).val();
                    $('#imagemPreview{{ $curso->id }}').attr('src', imagemUrl).show();
                });
            @endforeach

            $('#imagem').on('input', function() {
                var imagemUrl = $(this).val();
                $('#imagemPreviewCreate').attr('src', imagemUrl).show();
            });
        });
    </script>
</body>
</html>
