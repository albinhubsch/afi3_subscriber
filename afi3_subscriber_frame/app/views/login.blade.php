@extends('layout')
@section('content')
	{{ Form::open() }}
		{{ Form::token() }}
		{{ Form::text('email', null, array('placeholder' => 'Email')) }}
		{{ Form::password('password', array('placeholder' => 'Password')) }}
		{{ Form::submit('Sign in', array()) }}
	{{ Form::close() }}
@stop