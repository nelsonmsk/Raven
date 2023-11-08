@extends('reports.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-primary">
    <h2><span class="card-category">{{ __('Users Report') }} </span> 
    <a href="{{config('app.url')}}/usersReports/create" class="btn btn-secondary pull-right">Create New</a></h2>
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
              <th>Type</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($usersReports)
            @foreach($usersReports as $sr)
            <tr>
				<td>{{$sr->id}}</td>
				<td>{{$sr->title}}</td>
                <td>{{$sr->subtitle}}</td>
				<td>{{$sr->fromdate}}</td>
				<td>{{$sr->todate}}</td>
				<td>{{$sr->type}}</td>				
                <td>
					<a href="usersReports/{{$sr->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $usersReports ? $usersReports->links():'' }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $usersReports? $usersReports->currentPage():''}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection