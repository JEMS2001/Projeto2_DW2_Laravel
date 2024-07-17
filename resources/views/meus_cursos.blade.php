<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Cursos') }}
        </h2>
        <a href="/criar_curso"><button>Criar curso</button></a>
    </x-slot>

    <div>
        <h2>Meus Cursos</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($cursos as $curso)
        <div class="card col-md-3">
            <img src="{{ $curso->imagem }}" alt="">
            <div class="card-body">
                <p>{{ $curso->nome }}</p>
                <a href="{{ route('cursos.edit', $curso->id) }}"><button class="btn btn-primary">Editar</button></a>
                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>