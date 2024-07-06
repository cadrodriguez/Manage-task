<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::view('login',"Auth.Login")->name('login');
Route::view('/',"Auth.Login")->name('login');
Route::view('registro',"Auth.Registro")->name('registro');


    Route::controller(loginController::class)->group(function(){
    Route::post('access','login')->name('access');
    Route::get('newUser','newUser')->name('newUser');
    Route::get('logout','logout')->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(AppController::class)->group(function(){
            Route::get('categorias','getAllCategorias')->name('categorias');
            Route::get('alta','newCategoria')->name('alta');
            Route::get('categoria/{id}','getCategoria')->name('categoria');
            Route::get('actualizar/{id}','editCategoria')->name('actualizar');
            Route::get('borrar/{id}','deleteCategoria')->name('borrar');
        
            Route::get('registroTareas', 'registroTareas')->name('registroTareas');
            Route::get('guardar','newTarea')->name('guardar');
            Route::get('tareas','getAllTareas')->name('tareas');
            Route::get('tarea/{id}','getTarea')->name('tarea');
            Route::get('modificar/{id}', 'editTarea')->name('modificar');
            Route::get('eliminar/{id}','deleteTarea')->name('eliminar');
        });
    });
    
