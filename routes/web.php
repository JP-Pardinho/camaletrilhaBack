<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Group;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', [])->name('site.login');
Route::post('/contato/salvar', [ContatoController::class, 'salvar'])->name('site.contato.salvar');

Route::middleware('autenticacao:ldap')->prefix('/app')->group(function () {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.cliente');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});


Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ir para a página inicial.';
});
