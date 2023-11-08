@extends('orders.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Order') }} </span>
	<a href="{{config('app.url')}}/orders" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="orders-form " method="post" action="orders" data-parsley-validate >
      <div class="form-group">
      <input type="hidden" value="{{csrf_token()}}" name="_token" />
      <input type="hidden" id="id" value="{{$order->id}}" name="id" />	  
      <label for="items" class="col-sm-2 control-label">Items</label>
	<div class="col-sm-10">
    <textarea id="items" class="form-control" name="items" >{{$order->items}}</textarea>
	</div>
      </div>
      <div class="form-group">
      <label for="subTotal" class="col-sm-2 control-label">SubTotal:</label>
	<div class="col-sm-10">
      <input id="subTotal" type="text"  class="form-control" name="subTotal" value="{{$order->subTotal}}" required /> 
	</div>
      </div>	
      <div class="form-group">
      <label for="sRequest" class="col-sm-2 control-label">S.Request:</label>
	<div class="col-sm-10">
      <textarea id="sRequest" class="form-control" name="sRequest" >{{$order->sRequest}}</textarea>
	</div>
      </div>
      <div class="form-group">
      <label for="cName" class="col-sm-2 control-label">Customer Name:</label>
	<div class="col-sm-10">
      <input id="cName" type="text"  class="form-control" name="cName" value="{{$order->cName}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cPhone" class="col-sm-2 control-label">Customer Phone:</label>
	<div class="col-sm-10">
      <input id="cPhone" type="text"  class="form-control" name="cPhone" value="{{$order->cPhone}}" required />
	</div>
      </div>
      <div class="form-group">
      <label for="cAddress" class="col-sm-2 control-label">Customer Address:</label>
	<div class="col-sm-10">
      <textarea id="cAddress" class="form-control" name="cAddress" >{{$order->cAddress}}</textarea>
	</div>
      </div>
      <div class="form-group">
      <label for="cAddress" class="col-sm-2 control-label">Customer Email:</label>
	<div class="col-sm-10">
      <input id="cEmail" type="email"  class="form-control" name="cEmail" value="{{$order->cEmail}}" required />
	</div>
      </div>	  
      <div id="b-element" class="form-group"> 
		<input type="hidden" id="username" value="{{$order->username}}" name="username" />	  
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="save">Update</button>
      <a href="{{url()->previous()}}" class="btn btn-primary btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
