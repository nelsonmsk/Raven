@extends('reports.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-primary">
    <h2><span class="card-category">{{ __('Customers Report') }} </span> 
    <a href="http://localhost/ConstructionFirmApp/public/customersReports/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Title</th>
              <th>SubTitle</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>City</th>
              <th>Country</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($customersReports)
            @foreach($customersReports as $cr)
            <tr>
				<td>{{$cr->id}}</td>
				<td>{{$cr->title}}</td>
                <td>{{$cr->subtitle}}</td>
				<td>{{$cr->fromdate}}</td>
				<td>{{$cr->todate}}</td>
				<td>{{$cr->city}}</td>
				<td>{{$cr->country}}</td>				
                <td>
					<a href="customersReports/{{$cr->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $customersReports? $customersReports->links():'' }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{$customersReports? $customersReports->currentPage():''}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection