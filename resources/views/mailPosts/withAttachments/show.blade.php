@extends('profiles.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Profile') }} {{$profile->id }} </span>
		<a href="{{config('app.url')}}/profiles" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3">Id:</span><span class="col-md-9 text-left"> {{$profile->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Name:</span><span class="col-md-9 text-left"> {{$profile->name}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Email:</span><span class="col-md-9 text-left"> {{$profile->email}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Phone:</span><span class="col-md-9 text-left"> {{$profile->phone}}</span></div>	
							<div class="row form-group row-step"><span class="col-md-3">Title:</span><span class="col-md-9 text-left"> {{$profile->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Bio:</span><span class="col-md-9 text-left"> {{$profile->bio}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Address:</span><span class="col-md-9 text-left"> {{$profile->address}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Image:</span><span class="col-md-9 text-left"> {{$profile->image}}</span></div>								
							<div class="row form-group row-step"><span class="col-md-3">Created:</span><span class="col-md-9 text-left"> {{$profile->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Modified:</span><span class="col-md-9 text-left"> {{$profile->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-success ">
								<div class="fa fa-arrow-left text-white"></div>  Back</a>	
					<a href="profiles/{{$profile->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-folder-open text-white"></div> </a>					 
					<a href="profiles/{{$profile->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="profiles" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection