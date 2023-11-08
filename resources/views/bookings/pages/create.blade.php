@extends('bookings.Index')

@section('body')


  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Booking') }} </span>
	<a href="{{config('app.url')}}/bookings" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="bookings-form" method="post" action="bookings" data-parsley-validate >
      <div class="form-group">
     <input type="hidden" value="{{csrf_token()}}" name="_token" />	  
      <label for="dor" class="col-sm-2 control-label">Date:</label>
	<div class="col-sm-10">
      <input id="dor" type="date"  class="form-control" name="dor" required />
	</div>
      </div>
      <div class="form-group">
      <label for="rtime" class="col-sm-2 control-label">Time:</label>
	<div class="col-sm-10">
      <input id="rtime" type="time"  class="form-control" name="rtime"  required />
	</div>
      </div>	
      <div class="form-group">
      <label for="partySize" class="col-sm-2 control-label">Party Size:</label>
	<div class="col-sm-10">
      <input id="partySize" type="text"  class="form-control" name="partySize" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cName" class="col-sm-2 control-label">Customer Name:</label>
	<div class="col-sm-10">
      <input id="cName" type="text"  class="form-control" name="cName" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cPhone" class="col-sm-2 control-label">Customer Phone:</label>
	<div class="col-sm-10">
      <input id="cPhone" type="text"  class="form-control" name="cPhone" required />
	</div>
      </div>
      <div class="form-group">
      <label for="status" class="col-sm-2 control-label">Status:</label>
	<div class="col-sm-10">
      <select class="form-control" name="status"required >
      		<option value="active "> active  </option>
			<option value="cancelled "> cancelled</option>
	  </select> 
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
