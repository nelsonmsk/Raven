@extends('emails.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-success">
		<h2><span class="card-category">{{ __('Mail') }} {{$mailPost->id }} </span>
		<a href="http://localhost/ConstructionFirmApp/public/emails" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3">Id:</span><span class="col-md-9 text-left"> {{$mailPost->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">To:</span><span class="col-md-9 text-left"> {{$mailPost->to}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Cc:</span><span class="col-md-9 text-left"> {{$mailPost->cc}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">From:</span><span class="col-md-9 text-left"> {{$mailPost->from}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Subject:</span><span class="col-md-9 text-left"> {{$mailPost->subject}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Message:</span><span class="col-md-9 text-left"> {{$mailPost->message}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Created:</span><span class="col-md-9 text-left"> {{$mailPost->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3">Modified:</span><span class="col-md-9 text-left"> {{$mailPost->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-sm-4 btn-lg btn-success ">Back
								<div class="fa fa-arrow-left text-white"></div>  </a>	
					@if($mailPost->status == "draft")			
					<a href="emails/{{$mailPost->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary">Edit
								<div class="fa fa-folder-open text-white"></div> </a>			
					<form class="form-horizontal " id="mailpreview-form" method="post" action="preview">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />  						
						<input type="hidden" id="id" value="{{$mailPost->id}}" name="id" />	
						<input type="hidden" id="to" value="{{$mailPost->to}}" name="to" />
						<input type="hidden" id="cc" value="{{$mailPost->cc}}" name="cc" />			
						<input type="hidden" id="subject" value="{{$mailPost->subject}}" name="subject" />
						<input type="hidden" id="message" value="{{$mailPost->message}}" name="message" />							
						<input type="hidden" id="username" value="{{$mailPost->username}}" name="username" />
						<input type="hidden" id="status" value="{{$mailPost->status}}" name="status" />			
						<input type="hidden" id="image" value="{{$mailPost->image}}" name="image" />	
						<input type="hidden" id="imagePath" value="{{$mailPost->imagePath}}" name="imagePath" />
					<button type="submit" class="btn btn-warning btn-lg btn-sm-4" id="save-btn" name="save">Preview <div class="fa fa-folder-open text-white"></div></button>
					</form>
					@else 
					<a href="emails/{{$mailPost->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary disabled">Edit
								<div class="fa fa-folder-open text-white"></div> </a>						
					@endif
					<a href="emails/{{$mailPost->id}}"  id="delete-btn" class="btn btn-lg btn-sm-4 btn-danger " action="emails" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection