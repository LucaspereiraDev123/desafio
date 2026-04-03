<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TransacoesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware(Autenticador::class); 

Route::resource('/categorias', CategoriasController::class)
    ->middleware(Autenticador::class); 

Route::resource('/transacoes', TransacoesController::class)
    ->middleware(Autenticador::class); 

Route::get('/login', [UsuariosController::class, 'index'])->name('login');
Route::post('/login', [UsuariosController::class, 'store'])->name('signin');
Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/register', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/register', [UsuariosController::class, 'registerStore'])
->name('usuarios.registerStore');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->middleware(Autenticador::class); 

