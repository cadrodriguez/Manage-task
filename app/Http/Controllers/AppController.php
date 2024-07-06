<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Tareas;
use Illuminate\Http\Request;

class AppController extends Controller
{
    // Función para obtener todas las tareas y categorías
public function getAllTareas() {
    // Obtener todas las tareas
    $consulta = Tareas::all();
    // Obtener todas las categorías
    $categorias = Categorias::all();

    // Retornar la vista 'Tareas.Tareas' con las tareas, categorías y una variable 'tarea' nula
    return view('Tareas.Tareas')
        ->with('tareas', $consulta)
        ->with('categorias', $categorias)
        ->with('tarea', null);
}

// Función para obtener una tarea específica por su ID
public function getTarea($id) {
    // Obtener todas las tareas
    $consulta = Tareas::all();
    // Obtener todas las categorías
    $categorias = Categorias::all();
    // Buscar la tarea por su ID, fallar si no se encuentra
    $tarea = Tareas::findOrFail($id);

    // Retornar la vista 'Tareas.Tareas' con las tareas, categorías y la tarea específica
    return view('Tareas.Tareas')
        ->with('tareas', $consulta)
        ->with('categorias', $categorias)
        ->with('tarea', $tarea);
}

// Función para crear una nueva tarea
public function newTarea(Request $request) {
    // Crear una nueva instancia de Tareas
    $new = new Tareas();
    // Asignar los datos de la solicitud a la nueva tarea
    $new->name = $request->name;
    $new->description = $request->description;
    $new->status_id = 1; // Establecer el estado de la tarea
    $new->categoria_id = $request->categoria; // Asignar la categoría
    // Guardar la nueva tarea en la base de datos
    $new->save();

    // Redirigir a la ruta 'tareas' con un mensaje de éxito
    return redirect(route('tareas'))
        ->with('mensaje', "¡Se dio de alta la tarea exitosamente!");
}

// Función para editar una tarea existente
public function editTarea(Request $request, $id) {
    // Buscar la tarea por su ID, fallar si no se encuentra
    $update = Tareas::findOrFail($id);
    // Actualizar los datos de la tarea con los datos de la solicitud
    $update->name = $request->name;
    $update->description = $request->description;
    $update->status_id = 1; // Establecer el estado de la tarea
    $update->categoria_id = $request->categoria; // Asignar la categoría
    // Guardar los cambios en la base de datos
    $update->save();

    // Redirigir a la ruta 'tareas' con un mensaje de éxito
    return redirect(route('tareas'))
        ->with('mensaje', "¡Se actualizó la tarea exitosamente!");
}

// Función para eliminar una tarea por su ID
public function deleteTarea($id) {
    // Eliminar la tarea por su ID
    Tareas::destroy($id);

    // Redirigir a la ruta 'tareas' con un mensaje de éxito
    return redirect(route('tareas'))
        ->with('mensaje', "¡Se eliminó la tarea exitosamente!");
}

//---------------------------------------CATEGORIAS----------------------------------

// Función para obtener todas las categorías
public function getAllCategorias() {
    // Obtener todas las categorías
    $consulta = Categorias::all();

    // Retornar la vista 'Tareas.Categorias' con las categorías y una variable 'category' nula
    return view('Tareas.Categorias')
        ->with('categorias', $consulta)
        ->with('category', null);
}

// Función para obtener una categoría específica por su ID
public function getCategoria($id) {
    // Buscar la categoría por su ID
    $category = Categorias::find($id);
    // Obtener todas las categorías
    $consulta = Categorias::all();

    // Retornar la vista 'Tareas.Categorias' con las categorías y la categoría específica
    return view('Tareas.Categorias')
        ->with('categorias', $consulta)
        ->with('category', $category);
}

// Función para crear una nueva categoría
public function newCategoria(Request $request) {
    // Crear una nueva instancia de Categorias
    $new = new Categorias();
    // Asignar los datos de la solicitud a la nueva categoría
    $new->name = $request->name;
    // Guardar la nueva categoría en la base de datos
    $new->save();

    // Redirigir a la ruta 'categorias' con un mensaje de éxito
    return redirect(route('categorias'))
        ->with('mensaje', "¡Se creó la categoría exitosamente!");
}

// Función para editar una categoría existente
public function editCategoria(Request $request, $id) {
    // Buscar la categoría por su ID, fallar si no se encuentra
    $update = Categorias::findOrFail($id);
    // Actualizar el nombre de la categoría con los datos de la solicitud
    $update->name = $request->name;
    // Guardar los cambios en la base de datos
    $update->save();

    // Redirigir a la ruta 'categorias' con un mensaje de éxito
    return redirect(route('categorias'))
        ->with('mensaje', "¡Se actualizó la categoría exitosamente!");
}

// Función para eliminar una categoría por su ID
public function deleteCategoria($id) {

    //Creacion de una condicion para verificar que la categoria no este ligada a alguna tarea
    $Tareas = Tareas::where('categoria_id',$id)
    ->get();

    if($Tareas->count() === 0){
    // Eliminar la categoría por su ID 
    Categorias::destroy($id);
    // Redirigir a la ruta 'categorias' con un mensaje de éxito
    return redirect(route('categorias'))
        ->with('mensaje', "¡Se eliminó la categoría exitosamente!");
    
    }
    // Redirigir a la ruta 'categorias' con un mensaje de alerta 
    return redirect(route('categorias'))
    ->with('mensaje', "No se puede eliminar la categoria por que esta ligada a una tarea!");
}

}
