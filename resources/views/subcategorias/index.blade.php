@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Listado de Subcategorías</h2>
            <a href="{{ route('subcategorias.create') }}" class="btn btn-primary">Crear Subcategoría</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategorias as $subcategoria)
                    <tr>
                        <td>{{ $subcategoria->id }}</td>
                        <td>{{ $subcategoria->nombre }}</td>
                        <td>{{ $subcategoria->categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('subcategorias.edit', $subcategoria) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST" style="display:inline-block;">
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
