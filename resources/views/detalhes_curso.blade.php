<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $curso->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <img src="{{ $curso->imagem }}" alt="{{ $curso->nome }}">
                <div class="p-6">
                    <h2>{{ $curso->nome }}</h2>
                    <p>{{ $curso->descricao }}</p>
                    <p>Duration: {{ $curso->duracao }} hours</p>
                    <p>Price: ${{ $curso->preco }}</p>
                    
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
    </div>
</x-app-layout>