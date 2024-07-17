<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="/criar_curso"><button>Criar curso</button></a>
        <a href="/meus_cursos"><button>Meus Cursos</button></a>
    </x-slot>

    <div>
        <h2>Cursos</h2>
        @foreach ($cursos as $curso)
        <div class="card col-md-3">
            <img src="{{$curso->imagem}}" alt="">
            <div class="card-body">
                <p>{{$curso->nome}}</p>
                <a href="{{ route('curso.show', $curso->id) }}"><button class="btn btn-success">acessar</button></a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
