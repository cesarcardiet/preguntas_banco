@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Examen</h2>
            <form action="{{ route('examen.store') }}" method="POST">
                @csrf
                @foreach($preguntas as $pregunta)
                <div class="form-group">
                    <label>{{ $pregunta->titulo }}</label>
                    <input type="text" name="respuestas[{{ $pregunta->id }}]" class="form-control" required>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
