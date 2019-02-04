@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable">
			  <thead>
				  <tr>
					  <th>ID</th>
					  <th>Product Name</th>
					  <th>Picture</th>
					  <th>Category</th>
					  <th>Manufacturer</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($products as $product)

				<tr>
					<td>{{ $product->product_id }}</td>
					<td class="center">{{ $product->product_name }}</td>
					<td class="center">
						<img src="{{ asset('upload/images/'.$product->product_image) }}" style="height:60px; width: 80px "></td>
					<td class="center">{{ $product->category_name }}</td>
					<td class="center">{{ $product->manufacture_name }}</td>
					<td class="center">
						@if($product->status==1)
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Inactive</span>
						@endif
					</td>
					<td class="center">
						@if($product->status==1)
							<a class="btn btn-danger" href="								{{URL::to('/inactive-product',$product->product_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{ URL::to('/active-product',$product->product_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
						@endif
						<a class="btn btn-info" href="{{ URL::to('/editproduct',$product->product_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{ url('deleteprod',$product->product_id)}}">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
			@endforeach
			  </tbody>
		  </table>
		  <div class="pagination pagination-centered">
				  <ul>
					<li><a href="#">Prev</a></li>
					<li class="active">
					  <a href="#">1</a>
					</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">Next</a></li>
				</ul>
			</div>             
		</div>
	</div>
</div>
@endsection