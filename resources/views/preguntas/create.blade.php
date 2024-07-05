@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Crear Pregunta</h2>
            <form action="{{ route('preguntas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="opcion1">Opción 1</label>
                    <input type="text" name="opcion1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="opcion2">Opción 2</label>
                    <input type="text" name="opcion2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="opcion3">Opción 3</label>
                    <input type="text" name="opcion3" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="opcion4">Opción 4</label>
                    <input type="text" name="opcion4" class="form-control" required>
                </div>
                <select name="subcategoria_id" class="form-control">
    @foreach($subcategorias as $subcategoria)
        <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
    @endforeach
</select>
                <div class="form-group">
                    <label for="respuesta_correcta">Respuesta Correcta</label>
                    <select name="respuesta_correcta" class="form-control" required>
                        <option value="1">Opción 1</option>
                        <option value="2">Opción 2</option>
                        <option value="3">Opción 3</option>
                        <option value="4">Opción 4</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
