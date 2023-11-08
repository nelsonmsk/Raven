@extends('messages.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Message') }} {{$message->id }} </span>
		<a href="{{config('app.url')}}/messages" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$message->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Name:</b></span><span class="col-md-9 form-control text-left"> {{$message->name}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Email:</b></span><span class="col-md-9 form-control text-left"> {{$message->email}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Subject:</b></span><span class="col-md-9 form-control text-left"> {{$message->subject}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Message:</b></span><span class="col-md-9 form-control text-left"> {{$message->message}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Created At:</b></span><span class="col-md-9 form-control text-left"> {{$message->created_at}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$message->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$message->updated_at}}</span></div>	
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
					<a href="messages/{{$message->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger"  action="messages">Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection