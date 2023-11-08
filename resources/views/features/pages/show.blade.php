@extends('features.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Feature') }} {{$feature->id }}</span>
		<a href="{{config('app.url')}}/features" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Body Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$feature->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$feature->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Body:</b></span><span class="col-md-9 form-control text-left"> {{$feature->body}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Icon:</b></span><span class="col-md-9 form-control text-left"> {{$service->icon}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Page Id:</b></span><span class="col-md-9 form-control text-left"> {{$feature->pageId}}</span></div>						
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$feature->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$feature->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Body Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
								 Back <div class="fa fa-arrow-left text-white"></div> </a>	
					<a href="features/{{$feature->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-edit text-white"></div> </a>					 
					<a href="features/{{$feature->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="features" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection