@extends('projectTypes.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('ProjectTypes') }} </span> 
    <a href="{{config('app.url')}}/projectTypes/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
			@if($projectTypes)
    <table class="table table-condensed table-striped" >	
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

					@foreach($projectTypes as $pt)
					<tr>
						<td>{{$pt->id}}</td>
						<td>{{$pt->name}}</td>				
						<td>
							<a href="projectTypes/{{$pt->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
						</td>
					</tr>
					@endforeach
		

			
		</tbody>
		<tfoot>
			<tr>
				<td colspan="1" class="footnotes"></td>
				<td colspan="1" class="footnotes">{{ $projectTypes->links() }}</td>
				<td colspan="1" class="footnotes"><span>Current Page:{{ $projectTypes->currentPage()}}</span></td>
			</tr>
		</tfoot>

    </table>
		@else	
			<div class="row">
						<h2>No ProjectTypes Found</h2>
					</div>
	@endif	
 </div>   
</div>
</div>
</div>
@endsection