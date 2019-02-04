@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container col-sm-9">
		<div class="register-req">
			<p>Please Fillup the Information !</p>
		</div><!--/register-req-->

	<div class="col-sm-12 clearfix">
		<div class="bill-to">
			<p>Shipping Details</p>
			<div class="form-one">
				<form action="{{url('save-shipping-info')}}" method="post">
					{{csrf_field()}}
					<input type="email" name="shipping_email" placeholder="Email">
					<input type="text" name="shipping_first_name" placeholder="First Name">
					<input type="text" name="shipping_last_name" placeholder="Last Name">
					<input type="text" name="shipping_address" placeholder="Address">
					<input type="text" name="shipping_phone" placeholder="Phone Number">
					<input type="text" name="shipping_city" placeholder="City">
					<h2><input type="submit" class="btn btn-warning"></h2>
				</form>
			</div>
		</div>
	  </div>
	</div>
</section>
@endsection