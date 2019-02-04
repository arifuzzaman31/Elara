@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Information</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	
	</div><!--/span-->
</div><!--/row-->
			
<div class="row-fluid sortable">	
<div class="box span6">
	<div class="box-header">
		<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Info</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-bordered">
			  <thead>
				  <tr>
					  <th>Name</th>
					  <th>Phone</th>                  
				  </tr>
			  </thead>   
			  <tbody>
			  	
				<tr>
					<td>{{$viewInfos->customer_name}}</td>
					<td>{{$viewInfos->phone}}</td>   
				</tr>
				
			  </tbody>
		 </table>      
	</div>
</div><!--/span-->
				
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-condensed">
				  <thead>
					  <tr>
						  <th>Username</th>
						  <th>Address</th>
						  <th>Phone</th>
						  <th>Email</th>                                          
					  </tr>
				  </thead>   
				  <tbody>
				  	
					<tr>
						<td>{{$viewInfos->shipping_first_name.' '.$viewInfos->shipping_last_name}}</td>
						<td>{{$viewInfos->shipping_address}}</td>
						<td>{{$viewInfos->shipping_phone}}</td>
						<td>{{$viewInfos->shipping_email}}</td>
					</tr>
				        
				  </tbody>
			 </table>    
		</div>
	</div><!--/span-->

</div><!--/row-->
			
<div class="row-fluid sortable">	
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
			<div class="box-content">
				<table class="table table-bordered table-striped table-condensed">
					  <thead>
						  <tr>
							  <th>Product Id</th>
							  <th>Product Name</th>
							  <th>Product Price</th>
							  <th>Product Qty</th>            
							  <th>Product Sub-total</th>                 
						  </tr>
					  </thead>   
					  <tbody>
					
							<?php 
								$product_infos = DB::table('order_details')
									->where('order_id',$viewInfos->order_id)
									->get(); ?>
							@foreach($product_infos as $product_info)
						<tr>
							<td>{{$product_info->product_id}}</td>
							<td>{{$product_info->product_name}}</td>
							<td>{{$product_info->product_price}}</td>
							<td>{{$product_info->product_sales_quantity}}</td>        
							<td>{{$product_info->product_price*$product_info->product_sales_quantity}}</td>        
						</tr>
						@endforeach
					
					<tr>
						<td colspan="4"></td>
						<td><strong>Total : = {{$viewInfos->order_total}} TK</strong></td>
				    </tr>
				                   
					  </tbody>
				 </table>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/.fluid-container-->
				<!-- end: Content -->
	</div><!--/#content.span10-->
</div><!--/fluid-row-->

@endsection