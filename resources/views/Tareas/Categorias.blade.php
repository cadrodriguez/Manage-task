@extends('Tareas.Index')

@section('contenido')
<div>

    <div class="txtTitle">
        Administrador de Categorias
    </div><br>

    @if (Session::has('mensaje'))
    <center class="alert alert-success">
        {{ Session::get('mensaje') }}
    </center><br>
    @endif
    <div class="containerForm">

        @if($category)
        <form action="{{ route ('actualizar',$category -> id) }}">
            <h3>Actualizar Categoria</h3>
            @else
            <form action="{{ route ('alta') }}">
                <h3>Registrar Categoria</h3>
                @endif
                <hr>
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" required name="name" @if($category) value="{{ $category -> name}}" @endif>

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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td><a> {{ $categoria -> id }} </a></td>
                    <td>{{ $categoria -> name }}</td>
                    <td>
                        <a class="button" style="background-color: red;" href="{{ route('eliminar', $categoria -> id) }}">Eliminar</a>
                        <a class="button" style="background-color: blue;" href="{{ route('categoria', $categoria -> id) }}">Editar</a>

                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection