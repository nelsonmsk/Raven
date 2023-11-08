@extends('supports.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Support') }} {{$support->id }}</span>
		<a href="{{config('app.url')}}/supports" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$support->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Type:</b></span><span class="col-md-9 form-control text-left"> {{$support->type}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$support->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Question:</b></span><span class="col-md-9 form-control text-left"> {{$support->question}}</span></div>								
							<div class="row form-group row-step"><span class="col-md-3"><b>Answer:</b></span><span class="col-md-9 form-control text-left"> {{$support->answer}}</span></div>	
							<div class="row form-group row-step"><span class="col-md-3"><b>Video:</b></span><span class="col-md-9 form-control text-left"> {{$support->video}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$support->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$support->updated_at}}</span></div>	
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
					<a href="supports/{{$support->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-edit text-white"></div> </a>					 
					<a href="supports/{{$support->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="supports" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection