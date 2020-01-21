@extends('layout.layout')

@section('content')
    <h1>Tarefa: {{ $task->title }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Título:</strong> {{ $task->title }}<br>
            <strong>Descrição:</strong> {{ $task->description }}
        </p>
    </div>
@endsection