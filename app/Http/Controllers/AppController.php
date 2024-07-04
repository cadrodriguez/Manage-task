<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tareas;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getAllTareas(){
        $consulta = Tareas::all();
        return $consulta;
    }

    public function getTarea($id){
        $consulta = Tareas::find($id);
        return $consulta;
    }
    
    public function newTarea(Request $request){
        $new = new Tareas();
        $new->name = $request -> name;;
        $new->description = $request -> description;
        $new->status_id = 1;
        $new->categoria_id = $request -> categoria; 
        $new->save();
    }

    public function editTarea(Request $request, $id){
        $update = Tareas::findOrFail($id);
        $update->name = $request -> name;;
        $update->description = $request -> description;
        $update->status_id = 1;
        $update->categoria_id = $request -> categoria; 
        $update->save();
    }

    public function deleteTarea($id){
        Tareas::destroy($id);
    }

    public function getAllCategorias(){

        $consulta = Categorias::all();

        return $consulta;
    }

    public function getCategoria($id){

        $consulta = Categorias::find($id);

        return $consulta;
    }

    public function newCategoria(Request $request){

        $new = new Categorias();
        $new->name = $request->name;
        $new->save();

        return "Registro exitoso";
    }

    public function editCategoria(Request $request, $id){

        $update = Categorias::findOrFail($id);
        $update->name = $request->name;
        $update->save();

        return "Registro exitoso";
    }

    public function deleteCategoria($id){
        Categorias::destroy($id);
    }
}
