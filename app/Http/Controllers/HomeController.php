<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Curso;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $cursos = Curso::all();
        return view('home', ['cursos' => $cursos]);
    }
}