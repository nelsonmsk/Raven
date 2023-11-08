@extends('app defaults.Index')

@section('body')


  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-dark">
    <h2><span class="card-category">{{ __('Add Defaults') }} </span>
	<a href="{{config('app.url')}}/appDefaults" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="defaults-form" method="post" action="appDefaults" data-parsley-validate>
      <div class="form-group">
     <input type="hidden" value="{{csrf_token()}}" name="_token" />	  
      <label for="companyName" class="col-sm-2 control-label">Company Name:</label>
	<div class="col-sm-10">
      <input id="companyName" type="text"  class="form-control" name="companyName"   required />
	</div>
      </div>
	  <div class="form-group">
      <label for="appTitle" class="col-sm-2 control-label">App Title:</label>
	<div class="col-sm-10">
      <input id="appTitle" type="text"  class="form-control" name="appTitle"  required />
	</div>
      </div>
    <div class="form-group">
		<label for="brandHeading" class="col-sm-2 control-label">Brand Heading:</label>
		<div class="col-sm-10">
		  <input id="brandHeading" type="text"  class="form-control" name="brandHeading"  required />
		</div>
    </div>	  
    <div class="form-group">
		<label for="introText" class="col-sm-2 control-label">Intro Text:</label>
		<div class="col-sm-10">
		  <input id="introText" type="text"  class="form-control" name="introText"  required />
		</div>
    </div>
    <div class="form-group">
		<label for="aboutText" class="col-sm-2 control-label">About Text:</label>
		<div class="col-sm-10">
		  <textarea id="aboutText"  class="form-control" name="aboutText" ></textarea>
		</div>
    </div>
    <div class="form-group">
        <label for="introVideo" class="col-sm-2 control-label">Intro Video:</label>
		<div class="col-sm-10">
		  <input id="introVideo" type="url"  class="form-control" name="introVideo" />
		</div>
	</div>
      <div class="form-group">
      <label for="facebook" class="col-sm-2 control-label">Facebook:</label>
	<div class="col-sm-10">
      <input id="facebook" type="url"  class="form-control" name="facebook" " />
	</div>
      </div> 
     <div class="form-group">
		<label for="twitter" class="col-sm-2 control-label">Twitter:</label>
		<div class="col-sm-10">
		  <input id="twitter" type="url"  class="form-control" name="twitter"  />
		</div>
    </div>
    <div class="form-group">
        <label for="instagram" class="col-sm-2 control-label">Instagram:</label>
		<div class="col-sm-10">
		  <input id="instagram" type="url"  class="form-control" name="instagram"  />
		</div>
    </div>
     <div class="form-group">
		<label for="googleplus" class="col-sm-2 control-label">Google Plus:</label>
		<div class="col-sm-10">
		  <input id="googleplus" type="url"  class="form-control" name="googleplus" />
		</div>
    </div>
    <div class="form-group">
        <label for="youtube" class="col-sm-2 control-label">Youtube:</label>
		<div class="col-sm-10">
		  <input id="youtube" type="url"  class="form-control" name="youtube" />
		</div>
    </div>
    <div class="form-group">
        <label for="linkedin" class="col-sm-2 control-label">Linkedin:</label>
		<div class="col-sm-10">
		  <input id="linkedin" type="url"  class="form-control" name="linkedin" />
		</div>
    </div>	
    <div class="form-group">
        <label for="whatsapp" class="col-sm-2 control-label">WhatsApp:</label>
		<div class="col-sm-10">
		  <input id="whatsapp" type="tel"  class="form-control" name="whatsapp" placeholder="(+163) 878 989 309" required />
		</div>
    </div>
      <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Phone:</label>
	<div class="col-sm-10">
      <input id="phone" type="tel"  class="form-control" name="phone" placeholder="(+163) 878 989 309" required />
	</div>
      </div>
      <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email:</label>
	<div class="col-sm-10">
      <input id="email" type="email"  class="form-control" name="email" placeholder="CompanyName@gmail.com" required />
	</div>
      </div>
    <div class="form-group">
		<label for="address" class="col-sm-2 control-label">Address:</label>
		<div class="col-sm-10">
		  <textarea id="address" class="form-control" name="address"></textarea>
		</div>
    </div>
    <div class="form-group">
		<label for="contactText" class="col-sm-2 control-label">Contact Text:</label>
		<div class="col-sm-10">
		  <textarea id="contactText" class="form-control" name="contactText" required></textarea>
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