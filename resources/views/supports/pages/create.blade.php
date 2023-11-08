@extends('supports.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Support') }} </span> 
	<a href="{{config('app.url')}}/supports" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="supports-form1" method="post" action="supports" data-parsley-validate>
		<div class="form-group">  
			<input type="hidden" value="{{csrf_token()}}" name="_token" />      
			<label for="type" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
				<select class="form-control" name="type">
					<option value="registration">Registration</option>
					<option value="video-docs">Video</option>					
					<option value="general-faq">General</option>					
					<option value="accounts-faq">Accounts</option>
					<option value="pricing-faq">Pricing</option>					
				</select> 
			</div>
      </div>	
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title:</label>
			<div class="col-sm-10">
			  <input id="title" type="text"  class="form-control" name="title" required />
			</div>
		</div>
		<div class="form-group">      
		    <label for="question" class="col-sm-2 control-label">Question:</label>
			<div class="col-sm-10">
			  <input id="question" type="text"  class="form-control" name="question" />
			</div>
		</div>		  
		<div class="form-group">      
		    <label for="answer" class="col-sm-2 control-label">Answer:</label>
			<div class="col-sm-10">
			  <input id="answer" type="text"  class="form-control" name="answer"  />
			</div>
		</div>
		<div class="form-group">      
		    <label for="video" class="col-sm-2 control-label">Video:</label>
			<div class="col-sm-10">
			  <input id="video" type="text"  class="form-control" name="video"  />
			</div>
		</div>		
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
