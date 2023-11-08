@extends('gallery.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-primary">
    <h2><span class="card-category">{{ __('Edit gallery') }} </span>
	<a href="http://localhost/TheKateRestuarant/public/gallery" class="btn btn-default pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal fileupload" id="gallery-form2" method="post" enctype="multipart/form-data" data-parsley-validate>
      <div class="form-group">
     <input type="hidden" value="{{csrf_token()}}" name="_token" />	  
           <input type="hidden" id="id" value="{{$gallery->id}}" name="id" />
		    <input type="hidden" id="oldpath" value="{{$gallery->imagePath}}" name="oldpath" />			   
		    <input type="hidden" id="username" value="{{$gallery->username}}" name="username" />			
      <label for="name" class="col-sm-2 control-label">Name:</label>
	<div class="col-sm-10">
      <input id="name" type="text"  class="form-control" name="name" value="{{$gallery->name}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description:</label>
	<div class="col-sm-10">
      <input id="description" type="text"  class="form-control" name="description" value="{{$gallery->description}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="pageId" class="col-sm-2 control-label">Page Id:</label>
	<div class="col-sm-10">
      <input id="pageId" type="text"  class="form-control" name="pageId" value="{{$gallery->pageId}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="image" class="col-sm-2 control-label">Image:</label>
	<div class="col-sm-10">
      <input id="image" type="file"  class="upload form-control" name="image" value="{{$gallery->image}}" required />
	</div>
      </div>	  
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save" name="save">Update</button>
      <button type="button" class="btn btn-primary btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</button>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
