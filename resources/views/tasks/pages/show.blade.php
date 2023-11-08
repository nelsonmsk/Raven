@extends('tasks.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Task') }} {{$task->id }}</span>
		<a href="{{config('app.url')}}/tasks" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$task->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Name:</b></span><span class="col-md-9 form-control text-left"> {{$task->name}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Description:</b></span><span class="col-md-9 form-control text-left"> {{$task->description}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Project Id:</b></span><span class="col-md-9 form-control text-left"> {{$task->project_id}}</span></div>	
							<div class="row form-group row-step"><span class="col-md-3"><b>User Id:</b></span><span class="col-md-9 form-control text-left"> {{$task->user_id}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$task->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$task->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
								 Back <div class="fa fa-arrow-left text-white"></div> </a>	
					<a href="tasks/{{$task->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-edit text-white"></div> </a>					 
					<a href="tasks/{{$task->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="tasks" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection