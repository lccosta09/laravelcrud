@extends('layout.layout')

@section('content')
    <h1>Adicionar nova tarefa</h1>
    <hr>
     <form action="/tasks" method="post">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="taskTitle"  name="title">
      </div>
      <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" class="form-control" id="taskDescription" name="description">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection