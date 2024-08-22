<?php


use App\Http\Controllers\DetalhamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DelineamentoController;
use App\Http\Controllers\StatusProjetoController;
use App\Http\Controllers\TipoProjetoController;
use App\Http\Controllers\LoginController;

//Login
Route::get('/', [LoginController::class, 'login'])->name('login');

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Projetos
Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
Route::get('/projeto/novo', [ProjetoController::class, 'create'])->name('projetos.create');
Route::post('/projeto/novo', [ProjetoController::class, 'store'])->name('projetos.store');
Route::get('/projetos/config', [ProjetoController::class, 'config'])->name('projetos.config');

//Configurações de Projetos
Route::post('/projetos/config/status', [StatusProjetoController::class, 'status'])->name('config.status');
Route::post('/projetos/config/tipo', [TipoProjetoController::class, 'tipo'])->name('config.tipo');

//Delineamentos
Route::get('/delineamentos', [DelineamentoController::class,'index'])->name('delineamentos.index');
Route::get('/delineamentos/novo', [DelineamentoController::class,'create'])->name('delineamentos.create');

//Detalhamentos
Route::get('/detalhamentos', [DetalhamentoController::class,'index'])->name('detalhamentos.index');
Route::get('/detalhamentos/novo', [DetalhamentoController::class, 'create'])->name('detalhamentos.create');


 