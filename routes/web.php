<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;


Route::controller(loginController::class)->group(function(){
    Route::get('/','Login');
});

Route::controller(AppController::class)->group(function(){
    Route::get('categorias','getAllCategorias');
    Route::get('altaCategoria','newCategoria');
    Route::get('verCategoria/{id}','getCategoria');
    Route::get('editarCategoria/{id}','editCategoria');

    Route::get('newTarea','newTarea');
    Route::get('getAllTarea','getAllTareas');
    Route::get('borrar/{id}','deleteTarea');
});
