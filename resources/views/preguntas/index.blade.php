@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Listado de Preguntas</h2>
            <a href="{{ route('preguntas.create') }}" class="btn btn-primary">Crear Pregunta</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($preguntas as $pregunta)
                    <tr>
                        <td>{{ $pregunta->id }}</td>
                        <td>{{ $pregunta->titulo }}</td>
                        <td>{{ $pregunta->descripcion }}</td>
                        <td>
                            <a href="{{ route('preguntas.edit', $pregunta) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('preguntas.destroy', $pregunta) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
