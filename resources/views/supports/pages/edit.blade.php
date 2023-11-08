@extends('supports.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Support') }} </span>
	<a href="{{config('app.url')}}/supports" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="supports-form2" method="post" action="supports" data-parsley-validate>
		<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	  
			<input type="hidden" id="id" value="{{$support->id}}" name="id" />			   
			<input type="hidden" id="username" value="{{$support->username}}" name="username" />			
			<label for="type" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
				<select class="form-control" name="type">
					@if($support->type == 'registration')
					<option value="registration" selected>Registration</option>
					<option value="video-docs">Video</option>
					<option value="general-faq">General</option>
					<option value="accounts-faq">Accounts</option>	
					<option value="pricing-faq">Pricing</option>					
					@elseif($support->type == 'video-docs')
					<option value="registration">Registration</option>
					<option value="video-docs" selected>Video</option>
					<option value="general-faq">General</option>
					<option value="accounts-faq">Accounts</option>	
					<option value="pricing-faq">Pricing</option>
					@elseif($support->type == 'general-faq')
					<option value="registration">Registration</option>
					<option value="video-docs">Video</option>
					<option value="general-faq" selected>General</option>
					<option value="accounts-faq">Accounts</option>	
					<option value="pricing-faq">Pricing</option>
					@elseif($support->type == 'accounts-faq')
					<option value="registration">Registration</option>
					<option value="video-docs">Video</option>
					<option value="general-faq">General</option>
					<option value="accounts-faq" selected>Accounts</option>	
					<option value="pricing-faq">Pricing</option>
					@else ($support->type == 'pricing-faq')
					<option value="registration">Registration</option>
					<option value="video-docs">Video</option>
					<option value="general-faq">General</option>
					<option value="accounts-faq">Accounts</option>	
					<option value="pricing-faq" selected>Pricing</option>
					@endif					
				</select> 
			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title:</label>
			<div class="col-sm-10">
			  <input id="title" type="text"  class="form-control" name="title" value="{{$support->title}}" required />
			</div>
		</div>
		<div class="form-group">      
		    <label for="question" class="col-sm-2 control-label">Question:</label>
			<div class="col-sm-10">
			  <input id="question" type="text"  class="form-control" name="question" value="{{$support->question}}" />
			</div>
		</div>		  
		<div class="form-group">      
		    <label for="answer" class="col-sm-2 control-label">Answer:</label>
			<div class="col-sm-10">
			  <input id="answer" type="text"  class="form-control" name="answer" value="{{$support->answer}}" />
			</div>
		</div>
		<div class="form-group">      
		    <label for="video" class="col-sm-2 control-label">Video:</label>
			<div class="col-sm-10">
			  <input id="video" type="text"  class="form-control" name="video" value="{{$support->video}}"  />
			</div>
		</div>	
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
