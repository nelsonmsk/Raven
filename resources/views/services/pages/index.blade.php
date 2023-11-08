@extends('services.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-primary">
    <h2><span class="card-category">{{ __('Services') }} </span> 
    <a href="{{config('app.url')}}/services/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Icon</th>				  
              <th>PageId</th>
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($services)
            @foreach($services as $sv)
            <tr>
				<td>{{$sv->id}}</td>
				<td>{{$sv->name}}</td>
                <td>{{$sv->description}}</td>
				<td>{{$sv->icon}}</td>					
				<td>{{$sv->pageId}}</td>
                <td>
					<a href="services/{{$sv->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="1" class="footnotes"></td>
		<td colspan="2" class="footnotes">{{ $services->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $services->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection