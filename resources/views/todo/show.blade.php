@extends('welcome')

@section('content')


  <div class="panel panel-default">
      <div class="panel-heading">
        <span>{{ $todo->title }}</span>
        <div class="pull-right">
          <a href="#" class="complete">
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
        <p>Due Date: {{ $todo->DueDate or 'No Due Date set'}}</p>
        <p>Reminder: {{ $todo->ReminderDate or 'No Reminder set'}}</p>
        <p>Urgency: {{ $todo->Urgency }}</p>
        <p>Notes: {!! $todo->Notes or 'No Notes'!!}</p>
      </div>

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

  $("a.complete").on('click', function(e){
    e.preventDefault();
    $.ajax({
      url: "{{ route('todo.complete', ['id' => $todo->id]) }}",
      type: "post",
      success: function(){alert('success');}
    });

  });


  </script>




@endsection
