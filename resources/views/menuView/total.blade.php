@extends('menuView.index', ['subPage' => 'desserts',])

@section('totalsView')
  
  <div class="col-md-3 totalscard">
	  <div class="menu-card ">
		  <div class="menu-card-header header-danger">
			<h2> <span class="card-title">{{ __('My Order') }}</span>
			<a href="http://localhost/TheKateRestuarant/public/profiles" class="btn btn-default pull-right"><b>0</b>  {{ __('items') }}</a></h2>			
		  </div>
		<div class="menu-card-body">	 
		<div class =" table-responsive" id = "Rtable">
          <table class="table table-condensed table-bordered  table-striped" >  
		  <tbody>
					  <a href="javascript:void(0)">
						  <i  class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
					  </a>

                   <h4 class="card-title">Browse our menu and start adding items to order</h4>
			<tr>
			   
	
					   <div class="card-description" >{{__('SubTotal')}}:     $<b>0.00</b></div>
					   
				
			</tr>
			<tr>
			
			  <div> <button class="card-description" ><b>+</b> {{__('Special Request')}} </button></div>
			  Online Ordering Available
				
            </tr>
			<tr>
			
			 <a href="javascript:void(0)" class="btn btn-success btn-round">Order Now</a>
			
            </tr>			
           </tbody>
	      </table>
        </div>
	</div>		
	  </div>
  </div>

@endsection