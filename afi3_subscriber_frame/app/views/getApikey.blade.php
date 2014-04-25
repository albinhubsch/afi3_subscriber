@extends('layout')
@section('content')
	@if($errors->has())
		@foreach ($errors->all() as $error)
			<div class="validation_error">{{ $error }}</div>
		@endforeach
	@endif
	{{ Form::open() }}
		{{ Form::token() }}
		{{ Form::password('password', array('placeholder' => 'Choose a password')) }}
		{{ Form::submit('Get api key', array()) }}
	{{ Form::close() }}
@stop