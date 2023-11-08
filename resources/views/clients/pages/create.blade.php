@extends('clients.Index')

@section('body')
  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Client') }} </span>
	<a href="{{config('app.url')}}/clients" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="clients-form" method="post" action="clients" data-parsley-validate>
		<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	
		  <label class="col-sm-2 control-label">{{ __('Name') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="name" id="name" type="text"  required />
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Email') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="email" id="email" type="email" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Phone') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="phone" id="phone" type="tel" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Address') }}</label>
		  <div class="col-sm-10">
			  <textarea id="address" name="address" class="form-control"></textarea>
		</div>
	  </div>
		<div class="form-group">
			<label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
			<div class="col-sm-10">
			  <input id="city" type="text"  class="form-control" name="city"  required>
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-2 control-label">{{ __('Country') }}</label>
			<div class="col-sm-10">
			  <input id="country" type="text"  class="form-control" name="country"  required>
			</div>
		</div>		
      <div id="b-element" class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div></button>
		  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">{{ __('Cancel') }} <div class="fa fa-close text-white"></div></a>
		</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
