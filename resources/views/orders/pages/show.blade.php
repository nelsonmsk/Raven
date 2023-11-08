@extends('orders.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Order') }} {{$order->id }} </span>
		<a href="{{config('app.url')}}/orders" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Items:</b></span><span class="col-md-9 text-left"> {{$order->items}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>SubTotal:</b></span><span class="col-md-9 text-left"> {{$order->subTotal}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Special request:</b></span><span class="col-md-9 text-left"> {{$order->sRequest}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Customer Name:</b></span><span class="col-md-9 text-left"> {{$order->cName}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Customer Phone:</b></span><span class="col-md-9 text-left"> {{$order->cPhone}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Customer Address:</b></span><span class="col-md-9 text-left"> {{$order->cAddress}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Customer Email:</b></span><span class="col-md-9 text-left"> {{$order->cEmail}}</span></div>							
							<div class="row form-group row-step"><span class="col-md-3"><b>Status:</b></span><span class="col-md-9 text-left"> {{$order->status}}</span></div>							
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
					<img src="../img/note.png" alt="" /> <!-- Step Photo Here -->
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-success ">
								<div class="fa fa-arrow-left text-white"></div>  Back</a>	
					<a href="orders/{{$order->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-folder-open text-white"></div> </a>					 
					<a href="orders/{{$order->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger ">Delete
								<div class="fa fa-trash text-white"></div></a>
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection