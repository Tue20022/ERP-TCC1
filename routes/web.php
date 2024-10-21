<?php

use App\Http\Controllers\DetalhamentoController;
use App\Http\Controllers\DisciplinaDelineamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DelineamentoController;
use App\Http\Controllers\TipoProjetoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteProjetoController;
use App\Http\Controllers\StatusExecController;
use App\Http\Controllers\StatusPlanController;
use App\Http\Controllers\TEOController;

//Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
Route::get('/projetos/edit/{id}', [ProjetoController::class, 'edit'])->name('projetos.edit');
Route::put('/projetos/edit/{id}', [ProjetoController::class, 'update'])->name('projetos.update');
Route::delete('/projetos/delete/{id}', [ProjetoController::class, 'delete'])->name('projetos.delete');

//Tipos de Projetos
Route::post('/projetos/config/tipo', [TipoProjetoController::class, 'tipo'])->name('config.tipo');
Route::put('/projetos/config/tipo/edit{id}', [TipoProjetoController::class, 'tipoUpdate'])->name('config.editTipo');
Route::delete('/projetos/config/tipo/delete{id}', [TipoProjetoController::class, 'tipoDelete'])->name('config.deleteTipo');
Route::put('/projetos/config/tipo/disable{id}', [TipoProjetoController::class, 'tipoDisable'])->name('config.disableTipo');
Route::put('/projetos/config/tipo/enable{id}', [TipoProjetoController::class, 'tipoEnable'])->name('config.enableTipo');

//Status de Planejamento
Route::post('/projetos/config/statusPlan', [StatusPlanController::class, 'store'])->name('config.statusPlan');
Route::put('/projetos/config/statusPlan/edit{id}', [StatusPlanController::class, 'update'])->name('config.editStatusPlan');
Route::delete('/projetos/config/statusPlan/delete{id}', [StatusPlanController::class, 'delete'])->name('config.deleteStatusPlan');
Route::put('/projetos/config/statusPlan/disable{id}', [StatusPlanController::class, 'disable'])->name('config.disableStatusPlan');
Route::put('/projetos/config/statusPlan/enable{id}', [StatusPlanController::class, 'enable'])->name('config.enableStatusPlan');

//Status de Execução
Route::post('/projetos/config/statusExec', [StatusExecController::class, 'store'])->name('config.statusExec');
Route::put('/projetos/config/statusExec/edit{id}', [StatusExecController::class, 'update'])->name('config.editStatusExec');
Route::delete('/projetos/config/statusExec/delete{id}', [StatusExecController::class, 'delete'])->name('config.deleteStatusExec');
Route::put('/projetos/config/statusExec/disable{id}', [StatusExecController::class, 'disable'])->name('config.disableStatusExec');
Route::put('/projetos/config/statusExec/enable{id}', [StatusExecController::class, 'enable'])->name('config.enableStatusExec');

//Clientes de Projetos
Route::post('/projetos/config/cliente', [ClienteProjetoController::class, 'clientes'])->name('config.cliente');
Route::put('/projetos/config/cliente/edit{id}', [ClienteProjetoController::class, 'clientesUpdate'])->name('config.editCliente');
Route::delete('/projetos/config/cliente/delete{id}', [ClienteProjetoController::class, 'clientesDelete'])->name('config.deleteCliente');
Route::put('/projetos/config/cliente/disable{id}', [ClienteProjetoController::class, 'clientesDisable'])->name('config.disableCliente');
Route::put('/projetos/config/cliente/enable{id}', [ClienteProjetoController::class, 'clientesEnable'])->name('config.enableCliente');

//Delineamentos
Route::get('/delineamentos', [DelineamentoController::class,'index'])->name('delineamentos.index');
Route::get('/delineamentos/novo', [DelineamentoController::class,'create'])->name('delineamentos.create');
Route::post('/delineamentos/novo', [DelineamentoController::class,'store'])->name('delineamentos.store');
Route::get('/delineamentos/edit/{id}', [DelineamentoController::class,'edit'])->name('delineamentos.edit');
Route::put('/delineamentos/edit/{id}', [DelineamentoController::class,'update'])->name('delineamentos.update');
Route::delete('/delineamentos/delete/{id}', [DelineamentoController::class,'delete'])->name('delineamentos.delete');
Route::get('/delineamentos/config', [DelineamentoController::class,'config'])->name('delineamentos.config');

//Disciplinas de Delinamentos
Route::post('/delineamentos/config/disciplina', [DisciplinaDelineamentoController::class,'store'])->name('disciplina.store');
Route::put('/delineamentos/config/disciplina/edit/{id}', [DisciplinaDelineamentoController::class,'update'])->name('disciplina.update');
Route::delete('/delineamentos/config/disciplina/delete/{id}', [DisciplinaDelineamentoController::class,'delete'])->name('disciplina.delete');
Route::put('/delineamentos/config/disciplina/disable/{id}', [DisciplinaDelineamentoController::class,'disable'])->name('disciplina.disable');
Route::put('/delineamentos/config/disciplina/enable/{id}', [DisciplinaDelineamentoController::class,'enable'])->name('disciplina.enable');

//Detalhamentos
Route::get('/detalhamentos', [DetalhamentoController::class,'index'])->name('detalhamentos.index');
Route::get('/detalhamentos/novo', [DetalhamentoController::class, 'create'])->name('detalhamentos.create');
Route::post('/detalhamentos/novo', [DetalhamentoController::class, 'store'])->name('detalhamentos.store');
Route::get('/detalhamentos/edit/{id}', [DetalhamentoController::class, 'edit'])->name('detalhamentos.edit');
Route::put('/detalhamentos/edit/{id}', [DetalhamentoController::class, 'update'])->name('detalhamentos.update');
Route::delete('/detalhamentos/delete/{id}', [DetalhamentoController::class, 'delete'])->name('detalhamentos.delete');

//TEO
Route::get('/teos', [TEOController::class, 'index'])->name('teo.index');
Route::get('/teos/novo', [TEOController::class, 'create'])->name('teo.create');
Route::post('/teos/novo', [TEOController::class, 'store'])->name('teo.store');
Route::get('/teos/edit/{id}', [TEOController::class, 'edit'])->name('teo.edit');
Route::put('/teos/edit/{id}', [TEOController::class, 'update'])->name('teo.update');
Route::delete('/teos/delete/{id}', [TEOController::class, 'destroy'])->name('teo.delete');

 