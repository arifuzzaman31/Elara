@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>Add Brand</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
<div class="box-content">
<p class="alert-success">
  <?php 
		$message = Session::get('msg');
		if ($message) {
			echo $message;
			Session::flush();
		}
  		
   ?>
  </p>
<form class="form-horizontal" action="{{ URL::to('/add-brand')}}" method="post">
	{{ csrf_field() }}
  <fieldset>
	<div class="control-group">
	   <label class="control-label" for="date01">Brand Name</label>
	  <div class="controls">
		<input type="text" class="input-xlarge" name="brand_name">
	  </div>
	</div>          
	<div class="control-group hidden-phone">
	  <label class="control-label" for="textarea2">Brand Description</label>
	  <div class="controls">
		<textarea class="cleditor" id="textarea2" name="brand_description" rows="10"></textarea>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label" for="fileInput">Publication Status</label>
	  <div class="controls">
		<input type="checkbox" name="publication_status" value="1">
	  </div>
	</div>
	<div class="form-actions">
	  <button type="submit" class="btn btn-primary">Add Brand</button>
	</div>
  </fieldset>
</form>
</div>
</div>
</div> 
@endsection