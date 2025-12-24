<?php

use App\Http\Controllers\Ms\MsController;
use App\Http\Controllers\RedeSocialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home-site');

Route::resource('redes-sociais', RedeSocialController::class);

Route::get('/clientes', [MsController::class, 'clientes']);
