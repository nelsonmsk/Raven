@extends('galleryImages.Index')

@section('body')

<div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Edit GalleryImage') }} </span>
			<a href="{{config('app.url')}}/galleryImages" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
			<form class="form-horizontal singleForm" id="galleryImage-form2" method="post" action="galleryImages" data-parsley-validate>
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />	  
					<input type="hidden" id="id" value="{{$galleryImage->id}}" name="id" />
					<input type="hidden" id="oldimage" value="{{$galleryImage->image}}" name="oldimage" />					
					<input type="hidden" id="oldpath" value="{{$galleryImage->imagePath}}" name="oldpath" />			   
					<input type="hidden" id="username" value="{{$galleryImage->username}}" name="username" />			
					<label for="ref_class" class="col-sm-2 control-label">Ref Class:</label>
					<div class="col-sm-10">
					  <input id="ref_class" type="text"  class="form-control" name="ref_class" value="{{$galleryImage->ref_class}}" required />
					</div>
				</div>
				<div class="form-group">     
				  <label for="ref_id" class="col-sm-2 control-label">Ref Id:</label>
					<div class="col-sm-10">
					  <input id="ref_id" type="text"  class="form-control" name="ref_id"  value="{{$galleryImage->ref_id}}" required />
					</div>
				</div>	
				<div class="form-group">
				  <label for="title" class="col-sm-2 control-label">Title:</label>
					<div class="col-sm-10">
					  <input id="title" type="text"  class="form-control" name="title" value="{{$galleryImage->title}}" required />
					</div>
				</div>					
				<div class="form-group">
				  <label for="description" class="col-sm-2 control-label">Description:</label>
					<div class="col-sm-10">
					  <input id="description" type="text"  class="form-control" name="description"  value="{{$galleryImage->description}}" required />
					</div>
				</div>  
				<div id="b-element" class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">{{ __('Cancel') }} <div class="fa fa-close text-white"></div></a>
					</div>
				</div>
		    </form> 
		</div> 
    </div>
</div>
@endsection
