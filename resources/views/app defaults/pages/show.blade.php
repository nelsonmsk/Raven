
@extends('app defaults.Index')

@section('body')

<div class="col-lg-12 col-md-12 ">
    <div class="card">
	 
		<div class="card-header header-dark">
			<h2><span class="card-category">{{ __('Defaults') }} {{$appDefaults->id }}</span> 
			<a href="{{config('app.url')}}/appDefaults" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
			<section id="step-1" class="section-step step-wrap">
				<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
				@if ($appDefaults)		
					<div class="row">
						<!-- Step Description Starts -->
							<div class="col-md-4 step-desc">	
								<div class="row">
									<div class="card">
									    <span class="prof-txt text-left"><strong>{{__('Company Name:  ')}}</strong><span class="card-description"> {{ $appDefaults->companyName }}</span></span>
										<span class="prof-txt text-left"><strong>{{__('App Title:  ')}}</strong><span class="card-description"> {{ $appDefaults->appTitle }}</span></span>	
									    <span class="prof-txt text-left"><strong>{{__('Brand Heading:  ')}}</strong><span class="card-description"> {{ $appDefaults->brandHeading }}</span></span>									
									    <span class="prof-txt text-left"><strong>{{__('Intro Text:  ')}}</strong><span class="card-description"> {{ $appDefaults->introText }}</span></span><hr/>
									    <span class="prof-txt text-left"><strong>{{__('About Text:  ')}}</strong><span class="card-description"> {{ $appDefaults->aboutText }}</span></span><hr/>										
									    <span class="prof-txt text-left"><strong>{{__('Created:  ')}}</strong><span class="card-description"> {{ $appDefaults->created_at }}</span></span>
									    <span class="prof-txt text-left"><strong>{{__('Modified:  ')}}</strong><span class="card-description"> {{ $appDefaults->updated_at }}</span></span>											  
									</div>
								</div>
							</div>
						
						<div class="col-md-4 step-img">
							<div class="row">	
								<div class="card">
									<span class="prof-txt text-left"><strong>{{__('Intro Video:  ')}}</strong><span class="card-description"> {{ $appDefaults->introVideo }}</span></span>
									<span class="prof-txt text-left"><strong>{{__('WhatsApp:  ')}}</strong><span class="card-description"> {{ $appDefaults->whatsapp }}</span></span>									 
									<span class="prof-txt text-left"><strong>{{__('Phone:  ')}}</strong><span class="card-description"> {{ $appDefaults->phone }}</span></span>
									<span class="prof-txt text-left"><strong>{{__('Email:  ')}}</strong><span class="card-description"> {{ $appDefaults->email }}</span></span><hr/>
									<span class="prof-txt text-left"><strong>{{__('Address:  ')}}</strong><span class="card-description"> {{ $appDefaults->address }}</span></span>
									<span class="prof-txt text-left"><strong>{{__('Contact Text:  ')}}</strong><span class="card-description"> {{ $appDefaults->contactText }}</span></span>											  
								</div>
							</div>
						</div>				
						<div class="col-md-4 step-img">
							<div class="row">
								
							    <div class="card">
									 <div class="container text-center prof-padding">
										 <div class="prof-socials wow fadeInUp" data-wow-duration="1.5s">
											<a href="#"><i class="fa fa-facebook"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->facebook }} </span>
											<a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->twitter }} </span>
											<a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->instagram }} </span>
											<a href="#" class="social-googleplus"><i class="fa fa-google-plus"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->googleplus }} </span>
											<a href="#" class="social-youtube"><i class="fa fa-youtube-play"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->youtube }} </span>											
											<a href="#"><i class="fa fa-linkedin"></i></a><span class="prof-socials-span prof-txt2"> {{ $appDefaults->linkedin }} </span>
										</div>
									</div>									  
							    </div>
								
							</div>
						</div>				
					</div>

						<div class="row text-center">
							<a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
										  Back <div class="fa fa-arrow-left text-white"></div></a>						
							<a href="appDefaults/{{$appDefaults->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
										<div class="fa fa-edit text-white"></div> </a>					 
							<a href="appDefaults/{{$appDefaults->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="appDefaults" >Delete
										<div class="fa fa-trash text-white"></div></a>
						</div>
				@else
					<div class="row">
						<h2>No Record Found</h2>
					</div>
				@endif						  
				</div>
			</section>	             
		</div>
	</div>

</div>
@endsection