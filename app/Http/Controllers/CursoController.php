<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;
class CursoController extends Controller
{
    public function create()
    {
        return view('criar_curso');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer',
            'preco' => 'required|numeric',
            'imagem' => 'required|url',
        ]);

        // Criação do curso
        $curso = new Curso();
        $curso->nome = $validated['nome'];
        $curso->descricao = $validated['descricao'];
        $curso->duracao = $validated['duracao'];
        $curso->preco = $validated['preco'];
        $curso->imagem = $validated['imagem'];
        $curso->user_id = Auth::id();
        $curso->save();

        // Redireciona para uma página de sucesso ou de lista de cursos
        return redirect()->route('criar_curso')->with('success', 'Curso criado com sucesso!');
    }
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('detalhes_curso', ['curso' => $curso]);
    }

    public function meusCursos()
    {
        $user = Auth::user();
        $cursos = Curso::where('user_id', $user->id)->get();
        return view('meus_cursos', ['cursos' => $cursos]);
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('editar_curso', ['curso' => $curso]);
    }
    public function inscrever($id)
    {
        $curso = Curso::findOrFail($id);

        Inscricao::create([
            'curso_id' => $curso->id,
            'data_inscricao' => now()->format('Y-m-d'),
        ]);

        return redirect()->route('curso.show', $curso->id)->with('success', 'Você se inscreveu neste curso em ' . now()->format('d/m/Y'));
    }
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer',
            'preco' => 'required|numeric',
            'imagem' => 'required|url',
        ]);

        $curso->update($validated);
        return redirect()->route('meus_cursos')->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('meus_cursos')->with('success', 'Curso deletado com sucesso!');
    }
}