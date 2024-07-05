<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    @vite('resources/css/app.css')
</head>
<body style="background-color: #a3a8b7;">
   <div class="container mx-auto mt-20">
    <div class="flex justify-center">
      <div class="w-full max-w-sm bg-white rounded-lg shadow-md">
        <div class="px-6 py-4">
          <h2 class="text-center text-2xl font-bold">Registro</h2>

          <form class="mt-4" action="{{route('newUser')}}">

          @csrf


          <div class="mb-4">
              <label  for="name" class="block text-gray-700">Nombre:</label>
              <input required type="text" id="text" name="name" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
              
            </div>

            <div class="mb-4">
              <label for="email" class="block text-gray-700">Correo:</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
              <label for="password" class="block text-gray-700">Contraseña:</label>
              <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>

            <div class="flex items-center justify-center">
              <button type="submit" class="px-12 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Registrarte</button>
            </div>
            <br>
            <div class="flex items-center justify-center">
              <a href="{{route('login')}}" class="text-sm text-gray-600 hover:text-gray-700">Volver</a>
            </div><br>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>