@extends('welcome')

@section('scripts')

@stop

@section('content')

<h1 class="text-center">File Upload</h1>
	<p class="text-center">For sending pictures and videos of Edward to Tim and Jen.</p>
	<p class="text-center">Click and drag your files into the box below to upload.</p>
	<p class="text-center">Please note that each file can be no larger than 500mb</p>

	{!! Html::script('js/dropzone.js') !!}
	{!! Html::style('css/dropzone.css') !!}

	{!! Form::open(['route' => ['upload.store'], 'files' => true, 'class' => 'dropzone']) !!}

	

	<!-- {{ Form::file('images[]', [ 'multiple' => true ]) }} -->

	<!-- {{ Form::submit('Upload') }} -->

	{!! Form::close() !!}

@stop