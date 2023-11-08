@extends('orders.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
  <div class="card"> 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Orders') }} </span>
    <a href="{{config('app.url')}}/orders/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-warning">
              <th>ID</th>
              <th>Date</th>
              <th>Items List</th>
              <th>SubTotal</th>
			  <th>Special Request</th>
			  <th>Customer Name</th>
			  <th>Customer Phone</th>		
			  <th>Customer Address</th>
			  <th>Customer Email</th>			  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($orders)
            @foreach($orders as $od)
            <tr>
				<td>{{$od->id}}</td>
				<td>{{$od->created_at}}</td>
                <td>{{$od->items}}</td>
				<td>{{$od->subTotal}}</td>
                <td>{{$od->sRequest}}</td>
                <td>{{$od->cName}}</td>
				<td>{{$od->cPhone}}</td>	
				<td>{{$od->cAddress}}</td>	
                <td>{{$od->cEmail}}</td>				
                <td>
					<a href="orders/{{$od->id}}"  id="edit-btn" class="btn btn-primary ">Edit</a>
				</td>
				<td class="frm">
					<a href="orders/{{$od->id}}"  id="delete-btn" class="btn btn-danger ">Delete</a>
				</td>
            </tr>
            @endforeach
 	@else
	<tr>
	<td colspan="10"><p class="errortext">No record present</p></td>
	<td>{{$e->message}}</td>
	</tr>

	@endif

        </tbody>
<tfoot>
 	<tr>
		<td colspan="3" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $orders->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $orders->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection