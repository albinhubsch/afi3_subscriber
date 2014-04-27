@extends('layout')
@section('content')
	<p>Hi {{ $user->firstname }}</p>
	<p>Ditt prenumerationsnummer: {{ $user->subscription_number }}</p>
@stop