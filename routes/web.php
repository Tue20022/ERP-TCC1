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
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');

//Home
Route::get('/home', [HomeController::class, 'home'])->name('home');

//Configurações de Usuários
Route::get('/config/users', [HomeController::class, 'indexUsers'])->name('config.indexUsers');
Route::get('/config/newUser', [HomeController::class, 'createUser'])->name('config.createUser');
Route::post('/config/newUser', [HomeController::class, 'storeUser'])->name('config.storeUser');
Route::get('/config/editUser', [HomeController::class, 'editUser'])->name('config.editUser');
Route::put('/config/editUser/{id}', [HomeController::class, 'updateUser'])->name('config.updateUser');
Route::delete('/config/deleteUser/{id}', [HomeController::class, 'deleteUser'])->name('config.deleteUser');
Route::put('config/disableUser/{id}', [HomeController::class, 'disableUser'])->name('config.disableUser');
Route::put('config/enableUser/{id}', [HomeController::class, 'enableUser'])->name('config.enableUser');

//Configurações de Permissões
Route::get('/config/permission', [HomeController::class, 'configPermission'])->name('config.indexPermission');

// Projetos
Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
Route::get('/projeto/novo', [ProjetoController::class, 'create'])->name('projetos.create');
Route::post('/projeto/novo', [ProjetoController::class, 'store'])->name('projetos.store');
Route::get('/projetos/config', [ProjetoController::class, 'config'])->name('projetos.config');

//Status de Projetos
Route::post('/projetos/config/status', [StatusProjetoController::class, 'status'])->name('config.status');

//Tipos de Projetos
Route::post('/projetos/config/tipo', [TipoProjetoController::class, 'tipo'])->name('config.tipo');

//Delineamentos
Route::get('/delineamentos', [DelineamentoController::class,'index'])->name('delineamentos.index');
Route::get('/delineamentos/novo', [DelineamentoController::class,'create'])->name('delineamentos.create');

//Detalhamentos
Route::get('/detalhamentos', [DetalhamentoController::class,'index'])->name('detalhamentos.index');
Route::get('/detalhamentos/novo', [DetalhamentoController::class, 'create'])->name('detalhamentos.create');


 