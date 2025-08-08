<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrecificacaoController;

// Página inicial exibindo lista e formulário de precificação
Route::get('/', [PrecificacaoController::class, 'index'])->name('precificacao.index');

// Salvar novo registro
//Route::post('/precificacao', [PrecificacaoController::class, 'store'])->name('precificacao.store');

// Exibir formulário para editar
Route::get('/precificacao/{id}/edit', [PrecificacaoController::class, 'edit'])->name('precificacao.edit');

// Atualizar registro
Route::put('/precificacao/{id}', [PrecificacaoController::class, 'update'])->name('precificacao.update');

// Excluir registro
Route::delete('/precificacao/{id}', [PrecificacaoController::class, 'destroy'])->name('precificacao.delete');

// página inicial (lista + botão)
Route::get('/precificacao', [PrecificacaoController::class, 'index'])->name('precificacao.index'); 

// formulário novo
Route::get('/precificacao/create', [PrecificacaoController::class, 'create'])->name('precificacao.create'); 

// salvar novo
Route::post('/precificacao', [PrecificacaoController::class, 'store'])->name('precificacao.store'); 
