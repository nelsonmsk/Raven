@extends('reports.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-primary">
		<h2><span class="card-category">{{ __('UsersReport') }} <span class="text-white">{{$usersReport->id }}</span> </span>
		<a href="{{config('app.url')}}/usersReports" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>SubTitle:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->subtitle}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>From Date:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->fromdate}}</span></div>	
							<div class="row form-group row-step"><span class="col-md-3"><b>To Date:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->todate}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Status:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->type}}</span></div>						
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$usersReport->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
						<a href="{{url()->previous()}}" id="back-btn" class="btn btn-sm-4 btn-lg btn-default "> Back <div class="fa fa-arrow-left text-white"></div> </a>		
						<a href="usersReports/{{$usersReport->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary">Edit
									<div class="fa fa-edit text-white"></div> </a>			
						<form class="form-horizontal " id="reportPreview-form" method="post" action="preview">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />  						
							<input type="hidden" id="id" value="{{$usersReport->id}}" name="id" />	
							<input type="hidden" id="title" value="{{$usersReport->title}}" name="title" />
							<input type="hidden" id="subtitle" value="{{$usersReport->subtitle}}" name="subtitle" />			
							<input type="hidden" id="fromdate" value="{{$usersReport->fromdate}}" name="fromdate" />
							<input type="hidden" id="todate" value="{{$usersReport->todate}}" name="todate" />							
							<input type="hidden" id="type" value="{{$usersReport->type}}" name="type" />
							<input type="hidden" id="subsquery" value="{{$usersReport->subsquery}}" name="subsquery" />	
							<input type="hidden" id="username" value="{{$usersReport->username}}" name="username" />		
						<button type="submit" class="btn btn-warning btn-lg btn-sm-4" id="submit" name="lookup">Preview <div class="fa fa-folder-open text-white"></div></button>
						</form>
						<a href="usersReports/{{$usersReport->id}}"  id="delete-btn" class="btn btn-lg btn-sm-4 btn-danger " action="usersReports" >Delete
									<div class="fa fa-trash text-white"></div></a>
                  </div>				
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection