{!! Form::open([ 'route' => 'todo.store']) !!}
  <p>
				{!! Form::label('title', 'Title: ') !!}
				{!! Form::text('title', Request::old('title'), ['class' => 'form-control']) !!}
      </p>
      <p>
				{!! Form::label('notes', 'Notes: ') !!}
				{!! Form::textarea('Notes', Request::old('Notes'), ['class'=>'ckeditor']) !!}
      </p>
      <p>
        {!! Form::label('SendEmailReminder', 'Send Reminder? ') !!}
        {!! Form::checkbox('SendEmailReminder', 'SendEmailReminder') !!}
      </p>
      <p>
        {!! Form::label("ReminderDate", 'Reminder Date: ') !!}
        {!! Form::date('ReminderDate', \Carbon\Carbon::now()->addDay() ) !!}
      </p>
      <p>
        {!! Form::label('DueDate', 'Due Date: ') !!}
        {!! Form::date('DueDate', \Carbon\Carbon::now()->addDay() ) !!}
      </p>
        {!! Form::label('Urgency', 'Urgency: ') !!}
        {!! Form::select('Urgency', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], 'Medium') !!}
      <p>
				{!! Form::hidden('user_id', Auth::user()->id) !!}

				{!! Form::submit('Add To-Do', ['class' => 'btn btn-default']) !!}
      </p>
      
{!! Form::close() !!}
