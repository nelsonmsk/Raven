@extends('tasks.Index')

@section('body')

<div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Edit Task') }} </span>
		<a href="{{config('app.url')}}/tasks" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
		
		<div class="card-body">	
			<form class="form-horizontal singleForm" id="tasks-form2" method="post" action="tasks" data-parsley-validate>
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />	  
					<input type="hidden" id="id" value="{{$task->id}}" name="id" />			   
					<input type="hidden" id="username" value="{{$task->username}}" name="username" />			
					<label for="name" class="col-sm-2 control-label">Name:</label>
					<div class="col-sm-10">
					  <input id="name" type="text"  class="form-control" name="name" value="{{$task->name}}" required />
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">Description:</label>
					<div class="col-sm-10">
					  <input id="description" type="text"  class="form-control" name="description" value="{{$task->description}}" required />
					</div>
				</div>
				<div class="form-group">
					<label for="user_id" class="col-sm-2 control-label">User Id:</label>
					<div class="col-sm-10">
					  <input id="user_id" type="text"  class="form-control" name="user_id" value="{{$task->user_id}}" required />
					</div>
				</div>
				<div class="form-group">
					<label for="project_id" class="col-sm-2 control-label">Project Id:</label>
					<div class="col-sm-10">
					  <input id="project_id" type="text"  class="form-control" name="project_id" value="{{$task->project_id}}" required />
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
