@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>Add Product</h2>
		<div class="box-icon">
			<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
			<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
		</div>
	</div>
<div class="box-content">
<form class="form-horizontal" action="{{ URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
  <fieldset>
  	<p class="alert-success">
  <?php 
		$message = Session::get('msg');
		if ($message) {
			echo $message;
			Session::flush($message);
		}
  		
   ?>	
  </p>
	<div class="control-group">
	   <label class="control-label" for="date01">Product Name</label>
	  <div class="controls">
		<input type="text" class="input-xlarge" name="product_name" required="">
	  </div>
	</div> 
	<div class="control-group">
		<label class="control-label" for="selectError3">Product Category</label>
		<div class="controls">
		  <select id="selectError3" name="category_id">
		  	<option>Select Category</option>
		  	<?php
		  		$productCategory = DB::table('tbl_category')->where('publication_status',1)->get();
		  		foreach ($productCategory as $category) { ?>
		  			<option value="{{$category->category_id}}">{{$category->category_name}}</option>
		  		<?php }
		  	?>
			
			
		  </select>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="selectError3">manufacture name</label>
		<div class="controls">
		  <select id="selectError3" name="manufacture_id">
			<option>Select Manufacturare</option>
			<?php 
				$productManuf = DB::table('tbl_manufacture')->where('publication_status',1)->get();
				foreach ($productManuf as $manufac) { ?>
					<option value="{{$manufac->manufacture_id}}">{{$manufac->manufacture_name}}</option>
				<?php }
			 ?>
			
		  </select>
		</div>
	  </div>         
	<div class="control-group hidden-phone">
	  <label class="control-label" for="textarea2">Product short Description</label>
	  <div class="controls">
		<textarea class="cleditor" id="textarea2" name="product_short_desc" rows="10"></textarea>
	  </div>
	</div>
	<div class="control-group hidden-phone">
	  <label class="control-label" for="textarea2">Product long Description</label>
	  <div class="controls">
		<textarea class="cleditor" id="textarea2" name="product_long_desc" rows="10"></textarea>
	  </div>
	</div>
	<div class="control-group">
		<label class="control-label" for="date01">Product price</label>
		<div class="controls">
		  <input type="text" class="input-xlarge" name="product_price" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label">Image</label>
		<div class="controls">
		  <input type="file" name="image">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label" for="date01">Product size</label>
		<div class="controls">
		  <input type="text" class="input-xlarge" name="product_size" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label" for="date01">Product color</label>
		<div class="controls">
		  <input type="text" class="input-xlarge" name="product_color" required="">
		</div>
	 </div>
	<div class="control-group">
	  <label class="control-label" for="fileInput">Publication Status</label>
	  <div class="controls">
		<input type="checkbox" name="publication_status" value="1">
	  </div>
	</div>
	<div class="form-actions">
	  <button type="submit" class="btn btn-primary">Add Product</button>
	  <button type="reset" class="btn">Cancel</button>
	</div>
  </fieldset>
</form>
</div>
</div>
</div> 
@endsection