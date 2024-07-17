<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$curso->nome}}</h1>
    <img src="{{$curso->imagem}}" alt="">
    <p>{{ $curso->descricao }}</p>
    <p>{{ $curso->preco }}</p>
    <button>Inscrever-se</button>
    
</body>
</html>