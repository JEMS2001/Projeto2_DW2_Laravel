<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
</head>
<body>
    <h1>Criar Curso</h1>

    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Curso</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('criar_curso') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
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
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Curso</button>
        </form>
    </div>
</body>
</html>