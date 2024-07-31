<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    $cursos = \App\Models\Curso::all();
    return view('home', ['cursos' => $cursos]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/criar_curso', [CursoController::class, 'create'])->name('criar_curso');
    Route::post('/criar_curso', [CursoController::class, 'store']);

    Route::get('/meus_cursos', [CursoController::class, 'meusCursos'])->name('meus_cursos');
    Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

    Route::get('/curso/{id}', [CursoController::class, 'show'])->name('curso.show');
    Route::post('/curso/{id}/inscrever', [CursoController::class, 'inscrever'])->name('curso.inscrever');
});
