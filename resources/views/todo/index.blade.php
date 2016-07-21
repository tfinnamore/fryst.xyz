@extends('welcome')

@section('menubar')

  <a href="{{ route('todo.create') }}">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  </a>

@endsection

@section('content')

@foreach($todos as $todo)
  <div class="panel panel-default">
    <div class="panel-heading">
      <span>{{ $todo->title }}</span>
      <div class="pull-right">
        <a href="{{ route('todo.edit',['id' => $todo->id]) }}">
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="{{ route('todo.destroy',['id' => $todo->id]) }}">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
      </div>
    </div>
    <div class="panel-body">
      <p>Notes: {{ $todo->Notes }}</p>
      <p>Due Date: {{ $todo->DueDate }}</p>
      <p>Urgency: {{ $todo->Urgency }}</p>
      <p>Email  Reminder: {{ $todo->SendEmailReminder }}</p>
      <p>
        Email Reminder date: {{ $todo->ReminderDate }}
      </p>
    </div>
  </div>
  @endforeach

@stop
