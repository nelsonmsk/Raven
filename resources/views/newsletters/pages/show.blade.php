@extends('newsletters.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-purple">
		<h2><span class="card-category">{{ __('Newsletter') }} {{$newsletter->id }} </span>
		<a href="{{config('app.url')}}/newsletters" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control
							text-left"> {{$newsletter->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Type:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->type}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Summary:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->summary}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Created By:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->created_by}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Status:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->status}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Published Date:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->published_date}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$newsletter->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-sm-4 btn-lg btn-default ">Back
								<div class="fa fa-arrow-left text-white"></div>  </a>	
					@if($newsletter->status == "draft")			
					<a href="newsletters/{{$newsletter->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary">Edit
								<div class="fa fa-edit text-white"></div> </a>			
					<form class="form-horizontal " id="notificatiopreview-form" method="post" action="preview">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />  						
						<input type="hidden" id="id" value="{{$newsletter->id}}" name="id" />	
					<button type="submit" class="btn btn-warning btn-lg btn-sm-4" id="save-btn" name="save">Preview <div class="fa fa-folder-open text-white"></div></button>
					</form>
					<form class="form-horizontal singleForm" id="notificationsend-form" method="post" action="newsletters">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />  						
						<input type="hidden" id="id" value="{{$newsletter->id}}" name="id" />	
						<input type="hidden" id="title" value="{{$newsletter->title}}" name="title" />
						<input type="hidden" id="type" value="{{$newsletter->type}}" name="type" />			
						<input type="hidden" id="summary" value="{{$newsletter->summary}}" name="summary" />
						<input type="hidden" id="created_by" value="{{$newsletter->created_by}}" name="created_by" />							
						<input type="hidden" id="published_date" value="{{$newsletter->published_date}}" name="published_date" />
						<input type="hidden" id="status" value="{{$newsletter->status}}" name="status" />			
						<input type="hidden" id="image" value="{{$newsletter->image}}" name="image" />	
						<input type="hidden" id="imagePath" value="{{$newsletter->imagePath}}" name="imagePath" />
					<button type="submit" class="btn btn-success btn-lg btn-sm-4" id="save-btn" name="Send">Send <div class="fa fa-send text-white"></div></button>
					</form>					
					@else 
					<a href="newsletters/{{$newsletter->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary disabled">Edit
								<div class="fa fa-edit text-white"></div> </a>						
					@endif
					<a href="newsletters/{{$newsletter->id}}"  id="delete-btn" class="btn btn-lg btn-sm-4 btn-danger " action="newsletters" >Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection