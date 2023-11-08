@extends('galleryImages.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('GalleryImage') }} {{$galleryImage->id }}</span>
		<a href="{{config('app.url')}}/galleryImages" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	  
		<section id="step-1" class="section-step step-wrap">
			<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
				<div class="row">
					<!-- Step Body Starts -->
					<div class="col-md-6 step-desc">
						<div class="col-md-12 step-details">
								<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->id}}</span></div>
								<div class="row form-group row-step"><span class="col-md-3"><b>Ref Class:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->ref_class}}</span></div>
								<div class="row form-group row-step"><span class="col-md-3"><b>Ref ID:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->ref_id}}</span></div>
								<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->title}}</span></div>							
								<div class="row form-group row-step"><span class="col-md-3"><b>Description:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->description}}</span></div>							
								<div class="row form-group row-step"><span class="col-md-3"><b>Image:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->image}}</span></div>
								<div class="row form-group row-step"><span class="col-md-3"><b>ImagePath:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->imagePath}}</span></div>							
								<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->created_at}}</span></div>
								<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$galleryImage->updated_at}}</span></div>	
						</div> <!-- End step-details -->
					</div>
					<!-- Step Body Ends -->
					<div class="col-md-6 step-img">
						@if($galleryImage->imagePath != Null)
							<img src="{{ asset('storage/'.$galleryImage->imagePath)}}" alt="" /> <!-- Step Photo Here -->
						@else
							<img src="../images/portfolio/portfolio-1.jpg" alt="" /> <!-- Step Photo Here -->	
						@endif
					</div>
				</div>
						<div class="row text-center">
						 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
									 Back  <div class="fa fa-arrow-left text-white"></div> </a>	
						<a href="galleryImages/{{$galleryImage->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary " action="galleryImages" >Edit
									 <div class="fa fa-edit text-white"></div></a>								 
						<a href="galleryImages/{{$galleryImage->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="galleryImages" >Delete
									 <div class="fa fa-trash text-white"></div></a>
					  </div>			
			</div>
		</section>
		</div> 		   

    </div>
</div>
@endsection