<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{

    public function newUser(Request $request) {
        // Validar los datos recibidos en la solicitud
        $request->validate([
            'email' => 'required|email', // El campo email es requerido y debe ser un correo electrónico válido
            'password' => 'required|min:8', // El campo password es requerido y debe tener al menos 8 caracteres
            'name' => 'required|min:3' // El campo name es requerido y debe tener al menos 3 caracteres
        ]);
    
        // Crear un nuevo usuario con los datos validados
        $new = User::create([
            'name' => $request->name, // Asignar el nombre del usuario
            'email' => $request->email, // Asignar el email del usuario
            'password' => Hash::make($request->password), // Hashear la contraseña del usuario para almacenarla de forma segura
        ]);
    
        // Iniciar sesión con el nuevo usuario creado
        Auth::login($new);
    
        // Redirigir al usuario a la vista de tareas
        return view('Tareas.Tareas');
    }
    
    public function login(Request $request) {
        // Validar los datos recibidos en la solicitud
        $credentials = $request->validate([
            'email' => 'required|email', // El campo email es requerido y debe ser un correo electrónico válido
            'password' => 'required|min:8' // El campo password es requerido y debe tener al menos 8 caracteres
        ]);
    
        // Intentar autenticar al usuario con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();
    
            // Redirigir al usuario a la ruta destinada (en este caso, la vista de tareas)
            return redirect()->intended(route('tareas'));
        }
    
        // Si la autenticación falla, redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login');
    }
    
    public function logout() {
        // Cerrar la sesión del usuario
        Auth::logout();
    
        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login');
    }
    

}
