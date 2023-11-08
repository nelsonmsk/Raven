@extends('reports.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-primary">
		<h2><span class="card-category">{{ __('CustomersReport') }} <span class="text-white">{{$customersReport->id }}</span> </span>
		<a href="http://localhost/ConstructionFirmApp/public/customersReports" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->id}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Title:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->title}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>SubTitle:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->subtitle}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>From Date:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->fromdate}}</span></div>	
							<div class="row form-group row-step"><span class="col-md-3"><b>To Date:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->todate}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>City:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->city}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Country:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->country}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$customersReport->updated_at}}</span></div>	
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../images/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
						<a href="{{url()->previous()}}" id="back-btn" class="btn btn-sm-4 btn-lg btn-default "> Back <div class="fa fa-arrow-left text-white"></div> </a>		
						<a href="customersReports/{{$customersReport->id}}"  id="edit-btn" class="btn btn-sm-4 btn-lg btn-primary">Edit
									<div class="fa fa-edit text-white"></div> </a>			
						<form class="form-horizontal " id="reportPreview-form" method="post" action="preview">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />  						
							<input type="hidden" id="id" value="{{$customersReport->id}}" name="id" />	
							<input type="hidden" id="title" value="{{$customersReport->title}}" name="title" />
							<input type="hidden" id="subtitle" value="{{$customersReport->subtitle}}" name="subtitle" />			
							<input type="hidden" id="fromdate" value="{{$customersReport->fromdate}}" name="fromdate" />
							<input type="hidden" id="todate" value="{{$customersReport->todate}}" name="todate" />							
							<input type="hidden" id="city" value="{{$customersReport->city}}" name="city" />
							<input type="hidden" id="country" value="{{$customersReport->country}}" name="country" />							
							<input type="hidden" id="subsquery" value="{{$customersReport->subsquery}}" name="subsquery" />	
							<input type="hidden" id="username" value="{{$customersReport->username}}" name="username" />		
						<button type="submit" class="btn btn-warning btn-lg btn-sm-4" id="submit" name="lookup">Preview <div class="fa fa-folder-open text-white"></div></button>
						</form>
						<a href="customersReports/{{$customersReport->id}}"  id="delete-btn" class="btn btn-lg btn-sm-4 btn-danger " action="customersReports" >Delete
									<div class="fa fa-trash text-white"></div></a>
                  </div>				
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection