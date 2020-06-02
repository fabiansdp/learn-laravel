<!DOCTYPE html>
<html lang="zxx">
<head>
<title>SolMusic</title>
	<meta charset="UTF-8">
	<meta name="description" content="SolMusic HTML Template">
	<meta name="keywords" content="music, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="{{ asset('frontend/img/favicon.ico') }}" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Header section -->
		<header class="header-section clearfix">
			<a href="{{ url('/') }}" class="site-logo">
				<img src="{{ asset('frontend/img/logo.png') }}" alt="">
			</a>
			@guest
				<div class="header-right">
					<div class="user-panel">
						<a href="{{ route('login') }}" class="login">Login</a>
						<span>|</span>
						@if (Route::has('register'))
							<a href="{{ route('register') }}" class="register">Create an account</a>
						@endif
					</div> 
				</div>
			@else
				<li class="nav-item dropdown d-inline-flex">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
				</li>
			@endguest
			<ul class="main-menu">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ url('/playlist') }}">Playlist</a></li>
				<li><a href="{{ url('/artist') }}">Artists</a></li>
				<li><a href="{{ url('/news') }}">News</a></li>
				<li><a href="{{ url('/contact') }}">Contact</a></li>
			</ul>
		</header>
		<!-- Header section end -->

        @yield('content')
        @yield('footer')