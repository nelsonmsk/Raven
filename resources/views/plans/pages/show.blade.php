@extends('plans.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Plan') }} {{$plan->id }} </span>
		<a href="{{config('app.url')}}/plans" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$plan->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Name:</b></span><span class="col-md-9 form-control text-left"> {{$plan->name}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Price:</b></span><span class="col-md-9  text-left"> {{$plan->price}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Duration:</b></span><span class="col-md-9 form-control text-left"> {{$plan->duration}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Description:</b></span><span class="col-md-9  text-left"> {{$plan->description}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Page Id:</b></span><span class="col-md-9 form-control text-left"> {{$plan->pageId}}</span></div>						
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$plan->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$plan->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
								  Back <div class="fa fa-arrow-left text-white"></div></a>	
					<a href="plans/{{$plan->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-edit text-white"></div> </a>					 
					<a href="plans/{{$plan->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger"  action="plans">Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection