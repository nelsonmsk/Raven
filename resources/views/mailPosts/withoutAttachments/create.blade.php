@extends('mailPosts.Index')

@section('body')

  <div class="col-lg-8 col-md-8 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-success">
    <h2><span class="card-category">{{ __('Create Mail') }} </span> 
	<a href="{{config('app.url')}}/mails" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="mailPosts-form1" method="post" action="mails" data-parsley-validate>
      <div class="form-group">  
     <input type="hidden" value="{{csrf_token()}}" name="_token" />      
      <label for="to" class="col-sm-2 control-label">To:</label>
	<div class="col-sm-10">
      <input id="to" type="email"  class="form-control" name="to" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cc" class="col-sm-2 control-label">Cc:</label>
	<div class="col-sm-10">
      <input id="cc" type="email"  class="form-control" name="cc" required />
	</div>
      </div>
      <div class="form-group">
      <label for="subject" class="col-sm-2 control-label">Subject:</label>
	<div class="col-sm-10">
      <input id="subject" type="text"  class="form-control" name="subject" required />
	</div>
      </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Message') }}</label>
		  <div class="col-sm-10">
			  <textarea id="message" name="message" class="form-control" cols="30" rows="12"></textarea>
		</div>
	  </div>	  
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="save">Save</button>
      <a href="{{url()->previous()}}" class="btn btn-primary btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
