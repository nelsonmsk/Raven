@extends('banners.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Banner') }} </span> 
	<a href="{{config('app.url')}}/banners" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="banners-form1" method="post" action="banners"  data-parsley-validate>
      <div class="form-group">  
     <input type="hidden" value="{{csrf_token()}}" name="_token" />      
      <label for="heading" class="col-sm-2 control-label">Heading:</label>
		<div class="col-sm-10">
		  <input id="heading" type="text"  class="form-control" name="heading" required />
		</div>
      </div>
     <div class="form-group">
      <label for="subheading" class="col-sm-2 control-label">Sub Heading:</label>
		<div class="col-sm-10">
		  <input id="subheading" type="text"  class="form-control" name="subheading" required />
		</div>
      </div>	  
	<div class="form-group">
		<label for="body" class="col-sm-2 control-label">{{ __('Body:') }}</label>
		<div class="col-sm-10">
			  <textarea id="body" name="body" class="form-control"> </textarea>
		</div>
	</div>
      <div class="form-group">
      <label for="pageId" class="col-sm-2 control-label">Page Id:</label>
		<div class="col-sm-10">
		  <input id="pageId" type="text"  class="form-control" name="pageId" required />
		</div>
      </div>  	  
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div> </button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
