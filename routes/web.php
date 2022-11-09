<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;

Route::Resources([
    "professor" => ProfessorController::class,
    "turma" => TurmaController::class,
    "aluno" => AlunoController::class
]);

Route::get('/', function () {
    return view('welcome');
});
