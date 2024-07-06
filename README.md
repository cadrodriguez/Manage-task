Hola, Bienvnido al administrador de Tareas

Descripción del Proyecto

Se desarrollado un sistema de gestión de tareas utilizando Laravel, un framework PHP ampliamente utilizado para aplicaciones web. El sistema incluye funcionalidades para manejar tareas y categorías, permitiendo a los usuarios crear, leer, actualizar y eliminar tanto tareas como categorías. A continuación, se presenta una descripción de las principales funcionalidades desarrolladas:

Funcionalidades Principales

Gestión de Usuarios:

Registro de nuevos usuarios con validación de datos.
Inicio y cierre de sesión.
Hashing de contraseñas para garantizar la seguridad.

Gestión de Tareas:

Creación de nuevas tareas con nombre, descripción, estado y categoría asociada.
Edición de tareas existentes.
Eliminación de tareas.
Visualización de todas las tareas disponibles.

Gestión de Categorías:

Creación de nuevas categorías.
Edición de categorías existentes.
Eliminación de categorías, asegurando que no haya tareas asociadas antes de la eliminación.
Visualización de todas las categorías disponibles.

Interfaz de Usuario:

Uso de vistas de Blade para la presentación de datos.
Formulario de validación en el lado del servidor.
Uso de @media queries para hacer la interfaz responsive y mejorar la experiencia en dispositivos móviles.


Manual de Instalacion de Laravel: Se encuentra como un archivo txt

Guía para Descargar y Correr un Proyecto Laravel desde Git

1. Requisitos Previos
Asegúrate de tener los siguientes requisitos instalados en tu máquina:

Composer
PHP (Versión recomendada: 8.1 o superior)
Git
Node.js y npm (Opcional, pero recomendado para manejar assets)

2. Clonar el Repositorio
Abre tu terminal o línea de comandos y clona el repositorio de Git:

bash
Copiar código
git clone https://github.com/tu-usuario/tu-repositorio.git

3. Navegar al Directorio del Proyecto
Ve al directorio del proyecto que acabas de clonar:

bash
Copiar código
cd tu-repositorio

4. Instalar Dependencias
Usa Composer para instalar las dependencias de PHP del proyecto:

bash
Copiar código
composer install

5. Configurar el Archivo de Entorno
Copia el archivo .env.example a .env:

bash
Copiar código
cp .env.example .env

Abre el archivo .env en un editor de texto y configura los parámetros necesarios, como la conexión a la base de datos.

6. Generar la Clave de la Aplicación
Genera la clave de la aplicación Laravel:

bash
Copiar código
php artisan key:generate

7. Configurar la Base de Datos
Asegúrate de tener una base de datos configurada y actualiza las variables de entorno en el archivo .env para que se conecten a tu base de datos:

env
Copiar código
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

8. Migrar la Base de Datos
Ejecuta las migraciones para crear las tablas en la base de datos:

bash
Copiar código
php artisan migrate

9. (Opcional) Compilar los Assets
Si tu proyecto utiliza Laravel Mix para manejar assets (CSS, JS), instala las dependencias de Node.js y compílalos:

bash
Copiar código
npm install
npm run dev

10. Iniciar el Servidor de Desarrollo
Inicia el servidor de desarrollo de Laravel:

bash
Copiar código
php artisan serve
Tu proyecto ahora debería estar corriendo en http://localhost:8000.

Resumen
Clonar el repositorio.
Navegar al directorio del proyecto.
Instalar dependencias con Composer.
Configurar el archivo .env.
Generar la clave de la aplicación.
Configurar la base de datos en el archivo .env.
Ejecutar las migraciones.
(Opcional) Instalar y compilar assets con npm.
Iniciar el servidor de desarrollo.
