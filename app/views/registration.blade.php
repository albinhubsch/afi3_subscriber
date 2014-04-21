@extends('layout')
@section('content')
	@if($errors->has())
		@foreach ($errors->all() as $error)
			<div class="validation_error">{{ $error }}</div>
		@endforeach
	@endif
	{{ Form::open() }}
		{{ Form::token() }}
		{{ Form::text('email', null, array('placeholder' => 'Email')) }}
		{{ Form::password('password', array('placeholder' => 'Password')) }}
		{{ Form::text('personal_number', null, array('placeholder' => 'Personal number')) }}
		{{ Form::text('firstname', null, array('placeholder' => 'Firstname')) }}
		{{ Form::text('lastname', null, array('placeholder' => 'Lastname')) }}
		{{ Form::text('adress', null, array('placeholder' => 'Adress')) }}
		{{ Form::text('zip_code', null, array('placeholder' => 'Zip Code')) }}
		{{ Form::text('city', null, array('placeholder' => 'City')) }}
		{{ Form::text('country', null, array('placeholder' => 'Country')) }}

		{{ Form::submit('Register', array()) }}
	{{ Form::close() }}
@stop