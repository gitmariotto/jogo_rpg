<?php

use Illuminate\Support\Facades\Route;

// 1. Rota para a Página Inicial (Escolha de Personagem)
// Acessada por: http://localhost:8000/
Route::get('/', function () {
    // Carrega a view resources/views/index.blade.php
    return view('index'); 
})->name('index');

// 2. Rota para a Fase 1 (Intermediária, após escolha)
// Acessada por: http://localhost:8000/fase1
// Se você está usando fase1.blade.php, use 'fase1'
// Se você está usando fase1.html (como no screenshot), você precisará configurar o Laravel 
// para carregar arquivos .html ou renomeá-lo para fase1.blade.php.
Route::get('/fase1', function () {
    // Carrega a view resources/views/fase1.blade.php
    return view('fase1');
})->name('fase1'); 

// 3. Rota para a Batalha (Próxima etapa após a Fase 1)
// Acessada por: http://localhost:8000/batalha
Route::get('/batalha', function () {
    // Carrega a view resources/views/batalha.blade.php
    // Esta é a rota que estava causando o erro de "View não encontrada"
    return view('batalha');
})->name('batalha');


Route::get('/fase12', function () {
    // Carrega a view resources/views/batalha.blade.php
    // Esta é a rota que estava causando o erro de "View não encontrada"
    return view('fase12');
})->name('fase12');

Route::get('/creditos', function () {
    // Carrega a view resources/views/batalha.blade.php
    // Esta é a rota que estava causando o erro de "View não encontrada"
    return view('creditos');
})->name('creditos');

