<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	@include('admin.link')
		<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{ URL::to('backend/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url({{ URL::to('backend/img/bg-login.jpg')}}) !important; }
		</style>
	
</head>

<body>
<div class="container-fluid-full">
<div class="row-fluid">
			
	
	<div class="row-fluid">
		<div class="login-box">
			<div class="icons">
				<a href="{{url('/home')}}"><i class="halflings-icon home"></i></a>
				<a href="#"><i class="halflings-icon cog"></i></a>
			</div>
			<p class="alert-danger">
				<?php 
					$messege = Session::get('messege');
						if ($messege) {
								echo $messege;
								Session::put('messege',null);
						}
				?>

			</p>
			<h2>Login to your account</h2>
			<form class="form-horizontal" action="{{ URL::to('admin-login')}}" method="post">
				{{ csrf_field() }}
				<fieldset>				
					<div class="input-prepend">
						<span class="add-on"><i class="halflings-icon user"></i></span>
						<input class="input-large span10" name="admin_email" type="text" placeholder="type Email Address"/>
					</div>
					<div class="clearfix"></div>

					<div class="input-prepend">
						<span class="add-on"><i class="halflings-icon lock"></i></span>
						<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type password"/>
					</div>
					<div class="clearfix"></div>
					
					<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

					<div class="button-login">	
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					<div class="clearfix"></div>
				
			</form>
			<hr>
			<h3>Forgot Password?</h3>
			<p>
				No problem, <a href="#">click here</a> to get a new password.
			</p>	
		</div><!--/span-->
	</div><!--/row-->
	
</div><!--/.fluid-container-->

</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->
	@include('admin.adminjs')

	<!-- end: JavaScript-->
	
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:01 GMT -->
</html>
