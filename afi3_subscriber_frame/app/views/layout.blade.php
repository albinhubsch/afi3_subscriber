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

	<!-- {{ HTML::style('css/base.css') }} -->

</head>
<body>
	<nav>
		{{ HTML::link('', 'Home') }}
		@if(!Auth::check())
			{{ HTML::link('registration', 'Register') }}
			{{ HTML::link('login', 'Login') }}
		@else
			{{ HTML::link('myprofile', 'My Profile') }}
			{{ HTML::link('logout', 'Logout') }}
		@endif
	</nav>
	<div id="APP">
		@yield('content')
	</div>
</body>
</html>