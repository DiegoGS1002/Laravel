<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrecificacaoController;

// Página inicial exibindo lista e formulário de precificação
Route::get('/', [PrecificacaoController::class, 'index'])->name('precificacao.index');

// Exibir formulário para editar
Route::get('/precificacao/{id}/edit', [PrecificacaoController::class, 'edit'])->name('precificacao.edit');

// Atualizar registro
Route::put('/precificacao/{id}', [PrecificacaoController::class, 'update'])->name('precificacao.update');

// Excluir registro
Route::delete('/precificacao/{id}', [PrecificacaoController::class, 'destroy'])->name('precificacao.delete');

// página inicial (lista + botão)
Route::get('/precificacao', [PrecificacaoController::class, 'index'])->name('precificacao.index'); 

// formulário 
Route::get('/precificacao/create', [PrecificacaoController::class, 'create'])->name('precificacao.create'); 

Route::post('/precificacao', [PrecificacaoController::class, 'store'])->name('precificacao.store'); 
