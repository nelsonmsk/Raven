@extends('newsletters.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-purple">
    <h2><span class="card-category">{{ __('Edit Newsletter') }} </span>
	<a href="{{config('app.url')}}/newsletters" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal fileupload" enctype="multipart/form-data" id="newsletters-form2" method="post" action="newsletters" data-parsley-validate >
      <div class="form-group">
     <input type="hidden" value="{{csrf_token()}}" name="_token" />	
	 <input type="hidden" id="id" value="{{$newsletter->id}}" name="id" />			   
	 <input type="hidden" id="username" value="{{$newsletter->username}}" name="username" />
	 <input type="hidden" id="status" value="{{$newsletter->status}}" name="status" />			   
	 <input type="hidden" id="published_date" value="{{$newsletter->published_date}}" name="published_date" />	 
	 <input type="hidden" id="oldimage" value="{{$newsletter->image}}" name="oldimage" />	
	 <input type="hidden" id="oldpath" value="{{$newsletter->imagePath}}" name="oldpath" />	 
      <label for="title" class="col-sm-2 control-label">Title:</label>
	<div class="col-sm-10">
      <input id="title" type="text"  class="form-control" name="title"   value="{{ $newsletter->title }}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="type" class="col-sm-2 control-label">Type:</label>
	<div class="col-sm-10">
      <input id="type" type="text"  class="form-control" name="type"  value="{{ $newsletter->type }}" required />
	</div>
      </div>	
      <div class="form-group">
      <label for="summary" class="col-sm-2 control-label">Summary:</label>
	<div class="col-sm-10">
		<textarea id="summary" name="summary" class="form-control" cols="30" rows="12">{{ $newsletter->summary }}</textarea>
	</div>
      </div>
      <div class="form-group">
      <label for="created_by" class="col-sm-2 control-label">Created By:</label>
	<div class="col-sm-10">
      <input id="created_by" type="text"  class="form-control" name="created_by" value="{{ $newsletter->created_by }}" required />
	</div>
      </div>
	  <div class="form-group">
	  <label for="image" class="col-sm-2 control-label">Pdf:</label>
		<div class="col-sm-10">
			<div class="dropzone" id="my-dropzone" name="my-dropzone">
				<div class="dz-default dz-message">
					<h3 class="sbold">Drop files here to upload </br>or</h3>
					<h4 class="text-danger">You can also click to open file browser</h4>
				</div>	
				<h4 class="text-primary">Current Image:  {{$newsletter->image}}</h4>				
				<div class="fallback"><!-- this is the fallback if JS isn't working -->
					<input id="file" class="form-control" name="file" type="file" />
				</div>
			</div>	
		</div>
	  </div>	 
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		    <input type="hidden" id="username" value="{{$newsletter->username}}" name="username" />
      <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="submit" name="Update">Update <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
