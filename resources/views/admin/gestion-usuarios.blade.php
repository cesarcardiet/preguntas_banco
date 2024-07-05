@extends('layouts.app')

@section('content')
    <h1>Gestión de Usuarios</h1>

    @foreach ($usuarios as $usuario)
        <div>
            <h3>{{ $usuario->name }}</h3>
            <p>Rol Actual: {{ $usuario->role }}</p>
            <form action="{{ route('admin.cambiar-rol', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label>
                    Nuevo Rol:
                    <select name="role">
                        <option value="student" {{ $usuario->role === 'student' ? 'selected' : '' }}>Estudiante</option>
                        <option value="admin" {{ $usuario->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </label>
                <button type="submit">Cambiar Rol</button>
            </form>
        </div>
    @endforeach
@endsection
