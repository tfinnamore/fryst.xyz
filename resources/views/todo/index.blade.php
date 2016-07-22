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
      <a href="{{ route('todo.show', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
      <div class="pull-right">
        <a href="#">
          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
        </a>
        <a href="{{ route('todo.edit',['id' => $todo->id]) }}">
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        </a>
        <a href="#" class="remove">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
      </div>
    </div>
    <div class="panel-body">
      <p>Due Date: {{ $todo->DueDate }}</p>
      <p>Urgency: {{ $todo->Urgency }}</p>
      <p>Email Reminder date: {{ $todo->ReminderDate }}</p>
    </div>
  </div>
  @endforeach

@stop

@section('scripts')

<script>

$("a.remove").on('click', function(e){
  e.preventDefault();
  var result = confirm("Are you sure you want to delete?");
  if (result) {
    window.location = "{{ route('todo.destroy',['id' => $todo->id]) }}";
  }
});

</script>


@endsection
