@extends('layout')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="{{url('customer-login')}}" method="post">
						{{csrf_field()}}
						<input type="email" name="customer_email" placeholder="Email Address" />
						<input type="password" name="customer_password" placeholder="Password" />
						<button type="submit" name="customer_name" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-5">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="{{url('customer-register')}}" method="post">
						{{csrf_field()}}
						<input type="text" name="customer_name" placeholder="Name"/ required="">
						<input type="email" name="customer_email" placeholder="Email Address"/ required="">
						<input type="password" name="customer_password" placeholder="Password"/ required="">
						<input type="text" name="phone" placeholder="+880"/ required="">
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection