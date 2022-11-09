<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;

Route::Resources([
    "professor" => ProfessorController::class
]);

Route::get('/', function () {
    return view('welcome');
});
