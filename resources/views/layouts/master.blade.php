<!DOCTYPE html>
<html lang="zxx">
<head>
<title>SolMusic | Playlist</title>
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
			<a href="{{ url('index') }}" class="site-logo">
				<img src="{{ asset('frontend/img/logo.png') }}" alt="">
			</a>
			<div class="header-right">
				<span>|</span>
				<div class="user-panel">
					<a href="" class="login">Login</a>
					<a href="" class="register">Create an account</a>
				</div> 
			</div>
			<ul class="main-menu">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ url('/playlist') }}">Playlist</a></li>
				<li><a href="{{ url('/news') }}">News</a></li>
				<li><a href="{{ url('/contact') }}">Contact</a></li>
			</ul>
		</header>
		<!-- Header section end -->

        @yield('content')
        @yield('footer')