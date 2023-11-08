@extends('menus.pages.Index',['subPage' => 'mains'])

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Main') }} </span>
	<a href="http://localhost/LawFirmApp/public/menus/mains" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal fileupload" id="mains-menu-form1" method="post"   enctype="multipart/form-data" data-parsley-validate>
      <div class="form-group">
      <input type="hidden" value="{{csrf_token()}}" name="_token" />	  
      <label for="type" class="col-sm-2 control-label">Type:</label>
	<div class="col-sm-10">
      <input id="type" type="text"  class="form-control" name="type" required />
	</div>
      </div>
      <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name:</label>
	<div class="col-sm-10">
      <input id="name" type="text"  class="form-control" name="name"  required />
	</div>
      </div>	
      <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description:</label>
	<div class="col-sm-10">
      <input id="description" type="text"  class="form-control" name="description" required />
	</div>
      </div>
      <div class="form-group">
      <label for="price" class="col-sm-2 control-label">Price:</label>
	<div class="col-sm-10">
      <input id="price" type="text"  class="form-control" name="price" required />
	</div>
      </div>
      <div class="form-group">
      <label for="image" class="col-sm-2 control-label">Image:</label>
	<div class="col-sm-10">
      <input id="image" type="file"  class="form-control" name="image" required />
	</div>
      </div>
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save" name="save">Save</button>
      <button type="button" class="btn btn-primary btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</button>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
