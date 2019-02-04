@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Modify Brand</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
				@foreach($datas as $item)
			<form class="form-horizontal" action="{{ URL::to('/update-brand',$item->manufacture_id)}}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				   <label class="control-label" for="date01">Brand Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="manufacture_name" value="{{ $item->manufacture_name }}">
				  </div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Brand Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" name="manufacture_description" rows="10">{{ $item->manufacture_description }}</textarea>
				  </div>
				</div>
				@endforeach
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Brand</button>
				</div>
			  </fieldset>
			</form>
		</div>
	</div>
</div> 
@endsection