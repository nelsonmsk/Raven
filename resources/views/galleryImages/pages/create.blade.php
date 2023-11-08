@extends('galleryImages.Index')

@section('body')

<div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Add GalleryImage') }} </span> 
			<a href="{{config('app.url')}}/galleryImages" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
			<form class="form-horizontal fileupload" id="galleryImages-form1" method="post" enctype="multipart/form-data" data-parsley-validate>
				<div class="form-group">  
				  <input type="hidden" id="_token" value="{{csrf_token()}}" name="_token" />      
				  <label for="ref_class" class="col-sm-2 control-label">Ref Class:</label>
					<div class="col-sm-10">
					  <input id="ref_class" type="text"  class="form-control" name="ref_class" required />
					</div>
				</div>
				<div class="form-group">     
				  <label for="ref_id" class="col-sm-2 control-label">Ref Id:</label>
					<div class="col-sm-10">
					  <input id="ref_id" type="text"  class="form-control" name="ref_id" required />
					</div>
				</div>	
				<div class="form-group">
				  <label for="title" class="col-sm-2 control-label">Title:</label>
					<div class="col-sm-10">
					  <input id="title" type="text"  class="form-control" name="title" required />
					</div>
				</div>				
				<div class="form-group">
				  <label for="description" class="col-sm-2 control-label">Description:</label>
					<div class="col-sm-10">
					  <input id="description" type="text"  class="form-control" name="description" required />
					</div>
				</div>
				  <div class="form-group">
				  <label for="image" class="col-sm-2 control-label">Image:</label>
					<div class="col-sm-10">
						<div class="dropzone" id="my-dropzone" name="my-dropzone">
							<div class="dz-default dz-message">
								<h3 class="sbold">Drop files here to upload </br>or</h3>
								<h4 class="text-danger">You can also click to open file browser</h4>
							</div>		
							<div class="fallback"><!-- this is the fallback if JS isn't working -->
								<input id="file" class="form-control" name="file" type="file" />
							</div>
						</div>	
					</div>
				  </div>  
				<div id="b-element" class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="submit" name="save">Save <div class="fa fa-save text-white"></div></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
					</div>
				</div>
		    </form> 
		</div> 
	</div>
</div>
@endsection
