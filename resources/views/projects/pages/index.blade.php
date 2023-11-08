@extends('projects.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Projects') }} </span> 
    <a href="{{config('app.url')}}/projects/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
	@if($projects)
    <table class="table table-condensed table-striped" >	
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
			  <th>Type</th>
              <th>Start Date</th>			  
              <th>End Date</th>
              <th>Status</th>			  
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
				@foreach($projects as $pi)
				<tr>
					<td>{{$pi->id}}</td>
					<td>{{$pi->name}}</td>
					<td>{{$pi->type}}</td>						
					<td>{{$pi->sdate}}</td>				
					<td>{{$pi->edate}}</td>
					<td>{{$pi->status}}</td>				
					<td>
						<a href="projects/{{$pi->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
					</td>
				</tr>
				@endforeach	
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="footnotes"></td>
				<td colspan="4" class="footnotes">{{ $projects->links() }}</td>
				<td colspan="2" class="footnotes"><span>Current Page:{{ $projects->currentPage()}}</span></td>
			</tr>
		</tfoot>

    </table>
		@else	
			<div class="row">
						<h2>No Profile Found</h2>
			</div>
	@endif	
 </div>   
</div>
</div>
</div>
@endsection