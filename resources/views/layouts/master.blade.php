<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Flying Licorne') }}</title>
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!--[if IE]><link rel="shortcut icon" href="public/img/favicon.png"><![endif]-->
		<link rel="icon" href="public/img/favicon.png">
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<!-- Collapsed Hamburger -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<!-- Branding Image -->
						<a class="navbar-brand" href="{{ url('/') }}">
							{{ config('app.name', 'Flying Licorne') }}
						</a>
					</div>
					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<!-- Left Side Of Navbar -->
						<ul class="nav navbar-nav">
							&nbsp;
						</ul>
						<!-- Right Side Of Navbar -->
						<ul class="nav navbar-nav navbar-right">
							<!-- Authentication Links -->
							@guest
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
							@else
							<div class="flex-center position-ref full-height">
								@if (Route::has('login'))
								<div class="top-right links">
									@auth
									@else
									<br><a href="{{ route('login') }}" role="button">Se connecter</a><br>
									<a href="{{ route('register') }}" role="button">Créer un compte</a>
									@endauth
								</div>
								@endif
							</div>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
									<li>
										<a href="{{ url('/home') }}" role="button">Côté Professeur</a>
									</li>
								</ul>
							</li>
							@endguest
						</ul>
					</div>
				</div>
			</nav>
			@yield('content')
		</div>
		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>