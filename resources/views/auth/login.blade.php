<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Slightly-big Flip</title>

	<!-- General CSS Files -->
	
	<link href="{{URL::asset('css/all.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('js/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />


	<!-- CSS Libraries -->
	<link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet" type="text/css" />
	<!-- Template CSS -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
  
</head>

<body>
	<div id="app">
		<section class="section">
		<div class="d-flex flex-wrap align-items-stretch">
			<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
			<div class="p-4 m-3">
				<img src="{{asset('assets/img/stisla-fill.svg')}}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
				<h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Slightly-big Flip</span></h4>
				<p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul class='no-style mb-0'>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form method="POST" action="{{ route('do_login') }}" class="needs-validation" novalidate="">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
						<div class="invalid-feedback">
						Please fill in your email
						</div>
					</div>

					<div class="form-group">
						<div class="d-block">
						<label for="password" class="control-label">Password</label>
						</div>
						<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
						<div class="invalid-feedback">
						please fill in your password
						</div>
					</div>

					<div class="form-group">
						<div class="custom-control custom-checkbox">
						<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
						</div>
					</div>

					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
						Login
						</button>
					</div>

				
				</form>

				<div class="text-center mt-5 text-small">
				Copyright &copy; Your Company. Made with 💙 by Stisla
				<div class="mt-2">
					<a href="#">Privacy Policy</a>
					<div class="bullet"></div>
					<a href="#">Terms of Service</a>
				</div>
				</div>
			</div>
			</div>
			<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{asset('assets/img/unsplash/login-bg.jpg')}}">
			<div class="absolute-bottom-left index-2">
				<div class="text-light p-5 pb-2">
				<div class="mb-5 pb-3">
					<h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
					<h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
				</div>
				Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
				</div>
			</div>
			</div>
		</div>
		</section>
	</div>

  <!-- General JS Scripts -->

	<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/poper/poper.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery.nicescroll.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/moment/moment.js')}}" type="text/javascript"></script>	
	<script src="{{asset('assets/js/stisla.js')}}" type="text/javascript"></script>	

  <!-- JS Libraies -->

  <!-- Template JS File -->
	<script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>	
	<script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>	
	

  <!-- Page Specific JS File -->
</body>
</html>
