@extends('mailPosts.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-success">
		<h2><span class="card-category">{{ __('Mail') }} {{$mailPost->id }} </span>
		<a href="{{config('app.url')}}/mails" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 text-center step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 text-left"> {{$mailPost->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>To</b>span><span class="col-md-9 text-left"> {{$mailPost->to}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Cc:</b></span><span class="col-md-9 text-left"> {{$mailPost->cc}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>From:</b></span><span class="col-md-9 text-left"> {{$mailPost->from}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Subject:</b></span><span class="col-md-9 text-left"> {{$mailPost->subject}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Message:</b></span><span class="col-md-9 text-left"> {{$mailPost->message}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 text-left"> {{$mailPost->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 text-left"> {{$mailPost->updated_at}}</span></div>	
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
					<a href="mails/{{$mailPost->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-folder-open text-white"></div> </a>					 
					<a href="mails/{{$mailPost->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger " action="mails" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection