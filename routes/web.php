<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'index']);
Route::get('/register/create', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/edit/{id}',[RegisterController::class, 'edit']);
Route::put('/register/update/{id}', [RegisterController::class, 'update']);
Route::delete('/register/{id}', [RegisterController::class, 'destroy']);

