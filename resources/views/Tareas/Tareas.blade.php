@extends('Tareas.Index')

@section('contenido')
<div>

    <div class="txtTitle">
        Administrador de Tareas
    </div><br>

    @if (Session::has('mensaje'))
    <center class="alert alert-success">
        {{ Session::get('mensaje') }}
    </center><br>
    @endif
    <div class="containerForm">

        @if($tarea)
        <form action="{{ route ('modificar',$tarea -> id) }}">
            <h3>Actualizar Tarea</h3>
            @else
            <form action="{{ route ('guardar') }}">
                <h3>Registrar Tarea</h3>
                @endif
                <hr>
                <label for="name">Nombre</label>
                <div>
                    <input type="text" required name="name" @if($tarea) value="{{ $tarea -> name}}" @endif>

                    <label for="description">Descripcion</label>
                    <input type="text" required name="description" @if($tarea) value="{{ $tarea -> description}}" @endif>

                    <label for="categoria_id">Categorias</label>
                    <select name="categoria" required id="categoria">
                        <option value="">Selecciona una categoría</option> @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if (isset($tarea) && $tarea->categoria_id == $categoria->id)
                            selected
                            @endif>
                            {{ $categoria->name }}
                        </option>
                        @endforeach
                    </select>
                </div><br>
                <center>
                    <button class="btn" type="submit">Guardar</button><br>
                </center>

                <br>

            </form>
    </div>

    <br>
    <div class="rpv_table">
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                <tr>
                    <td><a> {{ $tarea -> id }} </a></td>
                    <td>{{ $tarea -> name }}</td>
                    <td>{{ $tarea -> description }}</td>
                    <td><a class="button" style="background-color: red;" href="{{ route('eliminar', $tarea -> id) }}">Eliminar</a>
                        <a class="button" style="background-color: blue;" href="{{ route('tarea', $tarea -> id) }}">Editar</a>
                    </td>
                    <td>
                        @if ($tarea->status_id == 1)
                        Registrado
                        @elseif ($tarea->status_id == 2)
                        Realizada
                        @else
                        Pendiente
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection