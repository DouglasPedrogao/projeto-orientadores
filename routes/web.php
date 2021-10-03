<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can Projeto web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ProjetoController;

Route::get('/', [ProjetoController::class, 'index']);
Route::get('/projetos/create', [ProjetoController::class, 'create']);
Route::post('/projetos', [ProjetoController::class, 'store']);
Route::get('/projetos/edit/{id}',[ProjetoController::class, 'edit']);
Route::put('/projetos/update/{id}', [ProjetoController::class, 'update']);
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
