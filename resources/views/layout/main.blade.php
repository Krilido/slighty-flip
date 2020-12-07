<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Admin Slightly-big Flip</title>  
	<!-- General CSS Files -->
	<link href="{{asset('js/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('js/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" >


	<!-- Template CSS -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
<!-- Start GA -->
	@yield('css')
    @yield('css-plugin')
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<div class="search-backdrop"></div>
					</div>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						<img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
						<div class="d-sm-none d-lg-inline-block">Hi, </div></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							{{-- <a href="features-activities.html" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a> 
							<a href="features-settings.html" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a> --}}
							<div class="dropdown-divider"></div>
							<a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>

			{{-- menu content --}}
			<div class="main-sidebar sidebar-style-2">
				@include('layout.menu')
			</div>

			<!-- Main Content -->
			<div class="main-content">
				@yield('content')
			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="https://nauval.in/">Raga</a>
				</div>
				<div class="footer-right">
					
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/poper/poper.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery.nicescroll.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/moment/moment.js')}}" type="text/javascript"></script>	
	<script src="{{asset('assets/js/stisla.js')}}"></script>
	
	<!-- JS Libraies -->
	{{-- <script src="{{asset('assets/modules/jquery.sparkline.min.js')}}"></script> --}}
	{{-- <script src="{{asset('assets/modules/chart.min.js')}}"></script> --}}
	{{-- <script src="{{asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script> --}}
	{{-- <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script> --}}
	{{-- <script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script> --}}

	<!-- Page Specific JS File -->
	{{-- <script src="{{asset('assets/js/page/index.js')}}"></script> --}}
	
	<!-- Template JS File -->
	<script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @yield('js-plugin')
		
    @yield('js')
</body>
</html>