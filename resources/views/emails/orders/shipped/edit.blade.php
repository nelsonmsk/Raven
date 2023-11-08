@extends('emails.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-success">
    <h2><span class="card-category">{{ __('Edit Mail') }} </span>
	<a href="{{config('app.url')}}/emails" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="mailPosts-form2" method="post" action="emails" data-parsley-validate>
      <div class="form-group">
     <input type="hidden" value="{{csrf_token()}}" name="_token" />	  
           <input type="hidden" id="id" value="{{$mailPost->id}}" name="id" />			   
		    <input type="hidden" id="username" value="{{$mailPost->username}}" name="username" />
		    <input type="hidden" id="status" value="{{$mailPost->status}}" name="status" />			
			<input type="hidden" id="image" value="{{$mailPost->image}}" name="image" />	
			<input type="hidden" id="imagePath" value="{{$mailPost->imagePath}}" name="imagePath" />			
      <label for="name" class="col-sm-2 control-label">To:</label>
	<div class="col-sm-10">
      <input id="to" type="email"  class="form-control" name="to" value="{{$mailPost->to}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cc" class="col-sm-2 control-label">Cc:</label>
	<div class="col-sm-10">
      <input id="cc" type="email"  class="form-control" name="cc" value="{{$mailPost->cc}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="subject" class="col-sm-2 control-label">Subject:</label>
	<div class="col-sm-10">
      <input id="subject" type="text"  class="form-control" name="subject" value="{{$mailPost->subject}}" required />
	</div>
      </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Message') }}</label>
		  <div class="col-sm-10">
			  <textarea id="message" name="message" class="form-control" cols="30" rows="12">{{$mailPost->message}}</textarea>
		</div>
	  </div>
      <div id="b-element" class="form-group">
		<div class="col-sm-offset-2 col-sm-10">	
		  <button type="submit" class="btn btn-primary btn-lg col-sm-3" id="save-btn" name="update">Update</button>		
		  <a href="{{url()->previous()}}" class="btn btn-cancel btn-lg col-sm-3 col-sm-offset-1" id="cancel" name="cancel">Cancel</a>
		</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
