@extends('bookings.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">


     <div class="card">
	 
	<div class="card-header header-danger">
	<h2><span class="card-category">{{ __('Bookings') }} </span>
    <a href="{{config('app.url')}}/bookings/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-bordered  table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>PartySize</th>
			  <th>Customer Name</th>
			  <th>Customer Phone</th>
			  <th>Status</th>		  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($bookings)
            @foreach($bookings as $rs)
            <tr>
				<td>{{$rs->id}}</td>
				<td>{{$rs->dor}}</td>
                <td>{{$rs->rtime}}</td>
				<td>{{$rs->partySize}}</td>
                <td>{{$rs->cName}}</td>
                <td>{{$rs->cPhone}}</td>
				<td>{{$rs->status}}</td>				
                <td>
					<a href="bookings/{{$rs->id}}"  id="edit-btn" class="btn btn-primary ">Edit</a>
				</td>
				<td class="frm">
					<a href="bookings/{{$rs->id}}"  id="delete-btn" class="btn btn-danger ">Delete</a>
				</td>
            </tr>
            @endforeach
 	@else
	<tr>
	<td colspan="10"><p class="errortext">No record present</p></td>
	<td>{{$e->getMessage()}}</td>
	</tr>

	@endif

        </tbody>
<tfoot>
 	<tr>
		<td colspan="3" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $bookings->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $bookings->currentPage()}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection