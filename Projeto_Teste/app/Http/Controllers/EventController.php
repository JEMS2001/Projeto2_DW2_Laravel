<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class EventController extends Controller
{
    
    public function index(){
        $cursos = Curso::all();
        return view('home',['cursos'=> $cursos]);
    }


    public function dashboard()
    {
        $search = request('search');
        if ($search) {
            $cursos = Curso::where('nome', 'like', '%' . $search . '%')
                           ->orWhere('descricao', 'like', '%' . $search . '%')
                           ->get();
        } else {
            $cursos = Curso::all();
        }
    
        return view('dashboard', ['cursos' => $cursos, 'search' => $search]);
    }

    public function curso(){
        return view('curso');
    }

    public function criar_curso(Request $request){

        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->descricao = $request->descricao;
        $curso->duracao = $request->duracao;
        $curso->preco = $request->preco;
        $curso->imagem = $request->imagem;

        $curso->save();

        return redirect('/')->with('msg','Curso criado com sucesso!!!');

    }

    public function mostrar_curso($id){

        $curso = Curso :: findOrFail($id);

        return view('mostrar_curso',['curso'=> $curso]);

    }
}
