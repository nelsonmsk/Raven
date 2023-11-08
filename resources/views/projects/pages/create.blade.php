@extends('projects.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Project') }} </span> 
	<a href="{{config('app.url')}}/projects" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="projects-form1" method="post" action="projects"  data-parsley-validate>
      <div class="form-group">  
     <input type="hidden" value="{{csrf_token()}}" name="_token" />      
      <label for="name" class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-10">
		  <input id="name" type="text"  class="form-control" name="name" required /> 
		</div>
      </div>
      <div class="form-group">    
		  <label for="type" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
			@if($projectTypes->count() != 0)
			  <select class="form-control" name="type" >
					@foreach($projectTypes as $pty)
						<option value="{{$pty->name}}">{{$pty->name}}</option>
					@endforeach
			  </select> 
			@else
				<input id="type" type="text"  class="form-control" name="type" required /> 
			@endif 
			</div>
      </div>	  
     <div class="form-group">
      <label for="sdate" class="col-sm-2 control-label">Start Date:</label>
		<div class="col-sm-10">
		  <input id="sdate" type="date"  class="form-control" name="sdate" required />
		</div>
      </div>	  
      <div class="form-group">
      <label for="edate" class="col-sm-2 control-label">End Date:</label>
		<div class="col-sm-10">
		  <input id="edate" type="date"  class="form-control" name="edate" required />
		</div>
      </div>
		<div class="form-group">
		  <label for="status" class="col-sm-2 control-label">Status:</label>
			<div class="col-sm-10">
			  <select class="form-control" name="status" >
					<option value="N/A"> N/A </option>					  
					<option value="pending ">pending</option>
					<option value="incomplete ">incomplete</option>
					<option value="completed">completed</option>							
			  </select> 
			</div>
		</div> 
      <div class="form-group">
		  <label for="description" class="col-sm-2 control-label">Description:</label>
			<div class="col-sm-10">
			  <textarea id="description" class="form-control" name="description" ></textarea>
			</div>
      </div>		
      <div class="form-group">
		<label for="client_id" class="col-sm-2 control-label">Client Id:</label>
		<div class="col-sm-10">
		  <input id="client_id" type="text"  class="form-control" name="client_id" required />
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
