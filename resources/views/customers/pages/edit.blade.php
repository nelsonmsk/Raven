@extends('customers.Index')

@section('body')
  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Customer') }} </span>
	<a href="http://localhost/ConstructionFirmApp/public/customers" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="customers-form" method="post" action="customers" data-parsley-validate>
		<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	
			<input type="hidden" value="{{$customer->id}}" id="id" name="id" />				
			<input type="hidden" value="{{$customer->username}}" name="username" />				
		  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
		  <div class="col-sm-6">
			  <input class="form-control" name="name" id="name" type="text" placeholder="{{ __('Name') }}" value="{{ $customer->name }}" required />
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
		  <div class="col-sm-6">
			  <input class="form-control" name="email" id="email" type="email" placeholder="{{ __('Email') }}" value="{{ $customer->email }}" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
		  <div class="col-sm-6">
			  <input class="form-control" name="phone" id="phone" type="tel" placeholder="{{ __('phone') }}" value="{{$customer->phone}}" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
		  <div class="col-sm-6">
			  <textarea id="address" name="address" class="form-control">{{$customer->address}} </textarea>
		</div>
	  </div>
		<div class="form-group">
			<label for="city" class="col-sm-2 col-form-label">{{ __('City') }}</label>
			<div class="col-sm-6">
			  <input id="city" type="text"  class="form-control" name="city" value="{{$customer->city}}"  required>
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-2 col-form-label">{{ __('Country') }}</label>
			<div class="col-sm-6">
			  <input id="country" type="text"  class="form-control" name="country" value="{{$customer->country}}"  required>
			</div>
		</div>	  
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">{{ __('Cancel') }} <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
