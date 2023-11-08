@extends('projects.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Project') }} </span>
	<a href="{{config('app.url')}}/projects" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="projects-form2" method="post" action="projects"  data-parsley-validate>
      <div class="form-group">
		 <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token" />	  
         <input type="hidden" id="id" value="{{$project->id}}" name="id" />			   
		 <input type="hidden" id="username" value="{{$project->username}}" name="username" />				
      <label for="name" class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-10">
		  <input id="name" type="text"  class="form-control" name="name" value="{{$project->name}}" required />
		</div>
      </div>
      <div class="form-group">    
		  <label for="type" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
			 @if($projectTypes->count() != 0)
			  <select class="form-control" name="type" >
					@foreach($projectTypes as $pty)
						@if( $pty->name == "{{$project->type}}" )
							<option value="{{$pty->name}}" selected>{{$pty->name}}</option>
						@else
							<option value="{{$pty->name}}">{{$pty->name}}</option>							
						@endif
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
		  <input id="sdate" type="date"  class="form-control" name="sdate" value="{{$project->sdate}}" required />
		</div>
      </div>	  
      <div class="form-group">
      <label for="edate" class="col-sm-2 control-label">End Date:</label>
		<div class="col-sm-10">
		  <input id="edate" type="date"  class="form-control" name="edate" value="{{$project->edate}}" required />
		</div>
      </div>
		<div class="form-group">
		  <label for="status" class="col-sm-2 control-label">Status:</label>
			<div class="col-sm-10">
			<select class="form-control" name="status" >					
			@if($project->status == "pending")
					<option value="N/A"> N/A </option>					  
					<option value="pending" selected>pending</option>
					<option value="incomplete">incomplete</option>
					<option value="completed">completed</option>
			  @elseif ($project->status == "incomplete")
					<option value="N/A"> N/A </option>					  
					<option value="pending">pending</option>
					<option value="incomplete" selected>incomplete</option>
					<option value="completed">completed</option>
			  @elseif ($project->status == "completed")
					<option value="N/A"> N/A </option>					  
					<option value="pending">pending</option>
					<option value="incomplete">incomplete</option>
					<option value="completed" selected>completed</option							
			  @else 
					<option value="N/A" selected> N/A </option>					  
					<option value="pending">pending</option>
					<option value="incomplete">incomplete</option>
					<option value="completed">completed</option>							
			  @endif
			  </select>
			</div>
		</div> 
      <div class="form-group">
		  <label for="description" class="col-sm-2 control-label">Description:</label>
			<div class="col-sm-10">
			  <textarea id="description" class="form-control" name="description" >{{$project->description}}</textarea>
			</div>
      </div>		
      <div class="form-group">
		<label for="client_id" class="col-sm-2 control-label">Client Id:</label>
		<div class="col-sm-10">
		  <input id="client_id" type="text"  class="form-control" name="client_id" value="{{$project->client_id}}" required />
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
