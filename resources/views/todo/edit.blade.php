@extends('welcome')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="text-center">Edit a To-do</h1>

{!! Form::model($todo, [ 'route' => ['todo.update', $todo->id] ]) !!}
  <p class="form-group">
	  {!! Form::label('title', 'Title: ') !!}
	  {!! Form::text('title', Request::old('title'), ['class' => 'form-control']) !!}
  </p>
  <p class="form-group">
	  {!! Form::label('notes', 'Notes: ') !!}
	  {!! Form::textarea('Notes', Request::old('Notes'), ['class'=>'ckeditor form-control']) !!}
  </p>
  <p class="form-group">
    {!! Form::label("ReminderDate", 'Reminder Date: ') !!}
    {!! Form::date('ReminderDate', null, ['class' => 'form-control datepicker']) !!}
  </p>
  <p class="form-group">
    {!! Form::label('DueDate', 'Due Date: ') !!}
    {!! Form::date('DueDate', null, ['class' => 'form-control'] ) !!}
  </p>
    {!! Form::label('Urgency', 'Urgency: ') !!}
    {!! Form::select('Urgency', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], Request::old('urgency'), ['class' => 'form-control']) !!}
  <p class="form-group">
		{!! Form::hidden('user_id', Auth::user()->id) !!}

		{!! Form::submit('Save Changes', ['class' => 'btn btn-default']) !!}
  </p>

{!! Form::close() !!}


@stop

@section('scripts')


  <script src="/ckeditor/ckeditor.js"></script>

  <script>

  $(function() {
    $( ".datepicker" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });

  </script>

@stop
