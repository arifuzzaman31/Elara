@extends('admin_layout')
@section('admin_content')
<p class="alert-success">
  <?php 
		$message = Session::get('msg');
		if ($message) {
			echo $message;
			Session::flush();
		}
  		
   ?>	
  </p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>All manufacture</h2>
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
					  <th>manufacture Name</th>
					  <th>Description</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			 @foreach($manufacturies as $manufacture)
				<tr>
					<td>{{ $manufacture->manufacture_id }}</td>
					<td class="center">{{ $manufacture->manufacture_name }}</td>
					<td class="center">{{ $manufacture->manufacture_description }}</td>
					<td class="center">
						@if($manufacture->publication_status==1)
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Unactive</span>
						@endif
					</td>
					<td class="center">
						@if($manufacture->publication_status==1)
							<a class="btn btn-danger" href="{{ URL::to('unactive-manufacture',$manufacture->manufacture_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
						@else
							<a class="btn btn-success" href="{{ URL::to('active-manufacture',$manufacture->manufacture_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
						@endif
						<a class="btn btn-info" href="{{ URL::to('/editmanu',$manufacture->manufacture_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{ URL::to('/dltmanu',$manufacture->manufacture_id)}}">
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