<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('resources/css/app.css')
</head>
<body style="background-color: #a3a8b7;">
   <div class="container mx-auto mt-20">
    <div class="flex justify-center">
      <div class="w-full max-w-sm bg-white rounded-lg shadow-md">
        <div class="px-12 py-4">
          <h2 class="text-center text-2xl font-bold">Login</h2><br>

          <form class="mt-4" action="{{ route ('access') }}" method="POST">
          @csrf
            <div class="mb-4">
              <label for="email" class="block text-gray-700">Correo:</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
              <label for="password" class="block text-gray-700">Contraseña:</label>
              <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>

            <div class="flex items-center justify-center">
              <button type="submit" class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Login</button>
            </div><br>
            <div class="flex items-center justify-center">
              ¿No tienes cuenta?
              <a href="{{route('registro')}}" class="text-sm text-gray-600 hover:text-gray-700">¡Registrate aqui!</a>
            </div><br>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>