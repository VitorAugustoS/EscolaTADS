<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AtividadeController;

Route::Resources([
    "professor" => ProfessorController::class,
    "turma" => TurmaController::class,
    "aluno" => AlunoController::class,
    "atividade" => AtividadeController::class
]);

Route::get('/', function () {
    return view('welcome');
});
