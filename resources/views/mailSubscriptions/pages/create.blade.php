@extends('mailSubscriptions.Index')

@section('body')

<div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Add MailSubscription') }} </span> 
		<a href="{{config('app.url')}}/mailSubscriptions" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
			<form class="form-horizontal singleForm" id="mailSubscriptions-form1" method="post" action="mailSubscriptions" data-parsley-validate>
			  <div class="form-group">  
				<input type="hidden" value="{{csrf_token()}}" name="_token" /> 
				<input type="hidden" id="code" value="0" name="code" />					
			   <label for="email" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-10">
				  <input id="email" type="email"  class="form-control" name="email" required />
				</div>
			  </div>
			 <div class="form-group">
			  <label for="status" class="col-sm-2 control-label">Status:</label>
				<div class="col-sm-10">
				  <select class="form-control" name="status" required >
						<option value="active "> active  </option>
						<option value="cancelled "> cancelled</option>
				  </select> 
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
