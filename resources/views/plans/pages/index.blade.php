@extends('plans.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Plans') }} </span> 
    <a href="{{config('app.url')}}/plans/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Duration</th>			  
              <th>Description</th>
              <th>PageId</th>
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($plans)
            @foreach($plans as $sv)
            <tr>
				<td>{{$sv->id}}</td>
				<td>{{$sv->name}}</td>
				<td>{{$sv->price}}</td>
				<td>{{$sv->duration}}</td>				
                <td>{{$sv->description}}</td>
				<td>{{$sv->pageId}}</td>
                <td>
					<a href="plans/{{$sv->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="2" class="footnotes"></td>
		<td colspan="3" class="footnotes">{{ $plans->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $plans->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection