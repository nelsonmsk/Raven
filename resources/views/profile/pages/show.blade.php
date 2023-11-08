@extends('profile.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('My Profile') }} </span>
				@if(!$profile)
				<a href="{{config('app.url')}}/profiles/create" class="btn btn-secondary pull-right">Create</a></h2>
				@endif
		</div>
	
		<div class="card-body">	
	
			<section id="step-1" class="section-step step-wrap">
				<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
				@if ($profile)		
					<div class="row">
						<!-- Step Description Starts -->
							<div class="col-md-4 step-desc">	
								<div class="row">
									<div class="col-md-12 step-details">
										<div class="card card-profile">
										   
												<div class="card-avatar">
												@if($profile->image)
													<a href="javascript:void(0)">
														<img class="img-round" src=" {{ asset('storage/'.$profile->imagePath)}}" />
													</a>
												@else
													<a href="javascript:void(0)">
														<img class="img-round" src=" {{url('/img/avatar4.jpg')}}" />
													</a>
												@endif
												</div>
												<h4 class="card-category text-gray">{{ $profile->title}}</h4>
												<h3 class="card-title"><b>{{ $profile->name }}</b></h3>
												<span class="card-description prof-txt2">
													  {{$profile->bio}}
												</span>					    
										</div>
									</div>
								</div>
							</div>
						
						<div class="col-md-4 step-img">
							<div class="row">
								
									  <div class="card">
											  <span class="prof-txt text-left"><strong>{{_('Name:  ')}}</strong><span class="card-description"> {{ $profile->name }}</span></span>
											  <span class="prof-txt text-left"><strong>{{_('Phone:  ')}}</strong><span class="card-description"> {{ $profile->phone }}</span></span>									 
											  <span class="prof-txt text-left"><strong>{{_('Email:  ')}}</strong><span class="card-description"> {{ $profile->email }}</span></span>
											  <span class="prof-txt text-left"><strong>{{_('Address:  ')}}</strong><span class="card-description"> {{ $profile->address }}</span></span>								  
									  </div>
								
							</div>
						</div>				
						<div class="col-md-4 step-img">
							<div class="row">
								
									  <div class="card">
											<div class="container text-center prof-padding">
												<div class="prof-socials wow fadeInUp" data-wow-duration="1.5s">
													<a href="#"><i class="fa fa-facebook"></i></a><span class="prof-socials-span prof-txt2"> {{ $profile->facebook }} </span>
													<a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a><span class="prof-socials-span prof-txt2"> {{ $profile->twitter }} </span>
													<a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a><span class="prof-socials-span prof-txt2"> {{ $profile->instagram }} </span>
													<a href="#"><i class="fa fa-linkedin"></i></a><span class="prof-socials-span prof-txt2"> {{ $profile->linkedin }} </span>
												</div>
											</div>									  
									  </div>
								
							</div>
						</div>				
					</div>

							<div class="row text-center">
							<a href="profiles/{{$profile->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
										<div class="fa fa-edit text-white"></div> </a>					 
							<a href="profiles/{{$profile->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="profiles" >Delete
										<div class="fa fa-trash text-white"></div></a>
						  </div>
				@else
					<div class="row">
						<h2>No Profile Found</h2>
					</div>
				@endif						  
				</div>
			</section>
		</div> 		   

    </div>
</div>
@endsection