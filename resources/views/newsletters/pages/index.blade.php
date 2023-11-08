@extends('newsletters.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">


     <div class="card">
	 
	<div class="card-header header-purple">
	<h2><span class="card-category">{{ __('Newsletters') }} </span>
    <a href="{{config('app.url')}}/newsletters/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Title</th>
              <th>Type</th>
              <th>Summary</th>
			  <th>Created_By</th>
              <th>Status</th>
			  <th>Published Date</th>				  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($newsletters)
            @foreach($newsletters as $ms)
            <tr>
				<td>{{$ms->id}}</td>
				<td>{{$ms->title}}</td>
                <td>{{$ms->type}}</td>
				<td>{{$ms->summary}}</td>
                <td>{{$ms->created_by}}</td>	
				<td>{{$ms->status}}</td>
                <td>{{$ms->published_date}}</td>			
                <td>
					<a href="newsletters/{{$ms->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="4" class="footnotes">{{ $newsletters->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $newsletters->currentPage()}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection