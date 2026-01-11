<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home-site');


// Route::get('/clientes', [MsController::class, 'clientes']);

// Rota index do cliente
Route::get('/lista-de-clientes', [ClienteController::class, 'index'])->name('cliente.index');

Route::get('/', [ClienteController::class, 'voltar'])->name('voltar.index');

Route::get('/produto', [ProdutoController::class, 'produto'])->name('produto.index');

Route::get('/cadastro-de-clientes', [ClienteController::class, 'criar'])->name('criar.cliente');

//Mostrar resultado
Route::get('/mostrar-clientes', [ClienteController::class, 'mostrar'])->name('cliente.mostrar');

//Rota para salvar no banco de dados
Route::post('/store-cliente', [ClienteController::class, 'store'])->name('cliente.store');

//Visualizar dados de acordo com o ID. {clientre}: serve para editar a partir desse cliente
Route::get('/editar-cliente/{cliente}', [ClienteController::class, 'editar'])->name('cliente.editar');

//Rota para atualizar (O método é put)
Route::put('/update-cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');


//Deletar usuário
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

