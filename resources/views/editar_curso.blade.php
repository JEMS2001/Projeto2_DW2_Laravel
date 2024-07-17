<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1 class="mb-4">Editar Curso</h1>
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
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Curso</button>
        </form>
    </div>
</x-app-layout>