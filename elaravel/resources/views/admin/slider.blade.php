@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>Add Slider</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
<div class="box-content">
<form class="form-horizontal" action="{{ URL::to('/save-slider')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
  <fieldset>
  	<p class="alert-success">
  <?php 
		$message = Session::get('messege');
		if ($message) {
			echo $message;
			Session::flush($message);
		}
  		
   ?>
  
  	
  </p>
	 <div class="control-group">
		<label class="control-label">Slider Image</label>
		<div class="controls">
		  <input type="file" name="sliderImage">
		</div>
	 </div>
	<div class="control-group">
	  <label class="control-label" for="fileInput">Publication Status</label>
	  <div class="controls">
		<input type="checkbox" name="publication_status" value="1">
	  </div>
	</div>
	<div class="form-actions">
	  <button type="submit" class="btn btn-primary">Add Slider</button>
	  <button type="reset" class="btn">Cancel</button>
	</div>
  </fieldset>
</form>
</div>
</div>
</div> 
@endsection