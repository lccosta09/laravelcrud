@extends('layout.layout')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Título</th>
          <th scope="col">Descrição</th>
          <th scope="col">Criação</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
        <tr>
          <th scope="row">{{$task->id}}</th>
          <td><a href="/tasks/{{$task->id}}">{{$task->title}}</a></td>
          <td>{{$task->description}}</td>
          {{ $task->created_at->setToStringFormat('d/m/Y H:m:i') }}
          <td>{{(string)$task->created_at}}</td>
          <td>
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ URL::to('/tasks/' . $task->id . '/edit') }}">
              	<button type="button" class="btn btn-warning">Editar</button>
              </a>&nbsp;
            <form action="{{url('/tasks', [$task->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="Excluir"/>
		  </form>
          </div>
		</td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection