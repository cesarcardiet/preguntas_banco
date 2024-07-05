@extends('layouts.app')

@section('content')
    <h1>Estadísticas Generales</h1>

    <div>
        <p>Total de Usuarios Registrados: {{ $totalUsuarios }}</p>
        <p>Total de Preguntas: {{ $totalPreguntas }}</p>
        <p>Total de Categorías: {{ $totalCategorias }}</p>
    </div>
@endsection
