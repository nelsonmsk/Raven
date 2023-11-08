@extends('customers.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Customers') }} </span>
	<a href="{{ env('APP_URL') }}/customers/create" class="btn btn-secondary pull-right">Create</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
			  <th>Address</th>	
              <th>City</th>
			  <th>Country</th>			  
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($customers)
            @foreach($customers as $cs)
            <tr>
				<td>{{$cs->id}}</td>
				<td>{{$cs->name}}</td>
                <td>{{$cs->email}}</td>
				<td>{{$cs->phone}}</td>
				<td>{{$cs->address}}</td>
				<td>{{$cs->city}}</td>
				<td>{{$cs->country}}</td>				
                <td>
					<a href="customers/{{$cs->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
				</td>
            </tr>
            @endforeach
 	@else
	<tr>
	<td colspan="10"><p class="errortext">No record present</p></td>
	</tr>

	@endif

        </tbody>
<tfoot>
 	<tr>
		<td colspan="2" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $customers? $customers->links():'' }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $customers? $customers->currentPage():''}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection