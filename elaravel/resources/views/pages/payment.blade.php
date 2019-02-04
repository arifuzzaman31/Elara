@extends('layout')
@section('content')

<div class="container col-sm-12">
	<div class="row">
		<div class="paymentCont">
			<div class="headingWrap">
					<h3 class="headingTop text-center">Select Your Payment Method</h3>	
					<p class="text-center">Created with bootsrap button and using radio button</p>
			</div>
			<form action="{{url('holding-place')}}" method="post">
				{{csrf_field()}}
			<div class="paymentWrap">
				<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
		            <label class="btn paymentMethod active">
		            	<div class="method visa"></div>
		                <input type="radio" name="payment_gatway" value="visa" checked>
		            </label>
		            <label class="btn paymentMethod">
		            	<div class="method master-card"></div>
		                <input type="radio" name="payment_gatway" value="master" >
		            </label>
		            <label class="btn paymentMethod">
	            		<div class="method amex"></div>
		                <input type="radio" name="payment_gatway" value="amex" >
		            </label>
		             <label class="btn paymentMethod">
	             		<div class="method vishwa"></div>
		                <input type="radio" name="payment_gatway" value="vishwa" >
		            </label>
		            <label class="btn paymentMethod">
	            		<div class="method ez-cash"></div>
		                <input type="radio" name="payment_gatway" value="ezcash" > 
		            </label>
		        </div>
			</div>
			<div class="footerNavWrap clearfix">
				<a href="{{url('/')}}"><div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
				<input type="submit" class="btn btn-success pull-right btn-fyi" value="Done">
			</div>
		   </form>
		</div>	
	</div>
</div>

@endsection