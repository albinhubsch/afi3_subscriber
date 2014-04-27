@extends('layout')
@section('content')
	{{ Form::model($user) }}

		{{ Form::token() }}
		{{ Form::password('password', array('placeholder' => 'Password')) }}
		{{ Form::text('firstname', null, array('placeholder' => 'Firstname')) }}
		{{ Form::text('lastname', null, array('placeholder' => 'Lastname')) }}
		{{ Form::text('adress', null, array('placeholder' => 'Adress')) }}
		{{ Form::text('zip_code', null, array('placeholder' => 'Zip Code')) }}
		{{ Form::text('city', null, array('placeholder' => 'City')) }}
		{{ Form::text('country', null, array('placeholder' => 'Country')) }}

		{{ Form::submit('Update', array()) }}

	{{ Form::close() }}
@stop