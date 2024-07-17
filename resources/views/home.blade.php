<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1> 
     
    <a href="/login"><button>login</button></a>
    <a href="/register"><button>Cadastro</button></a>

    <div>
        <h2>Cursos</h2>
        @foreach ($cursos as $curso)
        <div class="card col-md-3">
            <img src="{{ $curso->imagem }}" alt="">
            <div class="card-body">
                <p>{{ $curso->nome }}</p>
                <a href="/login"><button class="btn btn-success">acessar</button></a>
            </div>
        </div>
        @endforeach
    </div>
    
</body>
</html>