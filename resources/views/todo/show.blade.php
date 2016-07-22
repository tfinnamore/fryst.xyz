@extends('welcome')

@section('content')


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
        <p>Due Date: {{ $todo->DueDate or 'No Due Date set'}}</p>
        <p>Reminder: {{ $todo->ReminderDate or 'No Reminder set'}}</p>
        <p>Urgency: {{ $todo->Urgency }}</p>
      </div>

@stop
