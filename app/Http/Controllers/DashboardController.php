<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
class DashboardController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('dashboard',['cursos'=> $cursos]);
    }
}
