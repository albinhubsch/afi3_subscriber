<!doctype html>
<html lang="en">
<head>
	
	<title>Prenumeration | RaspiTimes SE</title>
	
	<!-- META TAGS -->
	<meta name="description" content="">
	<meta name="author" content="Albin Hubsch - albin.hubsch@gmail.com">
	<meta name="Copyright" content="Copyright {{ date('Y') }}">
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{ HTML::style('http://fonts.googleapis.com/css?family=Oxygen:400,300,700') }}
	{{ HTML::style('css/base.css') }}

</head>
<body>
	<nav>
		{{ HTML::link('', 'Hem') }}
		@if(!Auth::check())
			{{ HTML::link('registration', 'Registrera') }}
			{{ HTML::link('login', 'Logga in') }}
		@else
			{{ HTML::link('myprofile', 'Min profil') }}
			{{ HTML::link('myprofile/edit', 'Redigera min profil') }}
			{{ HTML::link('logout', 'Logga ut') }}
		@endif
	</nav>
	<div id="APP">
		@yield('content')
	</div>
</body>
</html>