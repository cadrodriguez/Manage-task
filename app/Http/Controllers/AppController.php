<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tareas;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getAllTareas(){
        $consulta = Tareas::all();
        $categorias = Categorias::all();

        return view('Tareas.Tareas')
        ->with('tareas',$consulta)
        ->with('categorias',$categorias)
        ->with('tarea',null);
        ;

    }

    public function getTarea($id){
        $consulta = Tareas::all();
        $categorias = Categorias::all();
        $tarea = Tareas::findOrFail($id);

        return view('Tareas.Tareas')
        ->with('tareas',$consulta)
        ->with('categorias',$categorias)
        ->with('tarea',$tarea);
    }
    
    public function newTarea(Request $request){
        $new = new Tareas();
        $new->name = $request -> name;
        $new->description = $request -> description;
        $new->status_id = 1;
        $new->categoria_id = $request -> categoria; 
        $new->save();

        return redirect(route('tareas'))
        ->with('mensaje',"¡Se dio de alta la tarea exitosamente !");
    }

    public function editTarea(Request $request, $id){
        $update = Tareas::findOrFail($id);
        $update->name = $request -> name;;
        $update->description = $request -> description;
        $update->status_id = 1;
        $update->categoria_id = $request -> categoria; 
        $update->save();

        return redirect(route('tareas'))
        ->with('mensaje',"¡Se actualizo la tarea exitosamente !");

    }

    public function deleteTarea($id){
        Tareas::destroy($id);

        return redirect(route('tareas'))
        ->with('mensaje',"¡Se elimino la tarea exitosamente !");


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

        return redirect(route('tareas'));
    }
}
