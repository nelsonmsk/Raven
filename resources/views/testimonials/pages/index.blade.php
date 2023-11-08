@extends('testimonials.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Testimonials') }} </span> 
    <a href="{{config('app.url')}}/testimonials/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Title</th>			  
              <th>Comment</th>
              <th>PageId</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($testimonials)
            @foreach($testimonials as $ts)
            <tr>
				<td>{{$ts->id}}</td>
				<td>{{$ts->name}}</td>
				<td>{{$ts->title}}</td>				
                <td>{{$ts->comment}}</td>
				<td>{{$ts->pageId}}</td>				
                <td>
					<a href="testimonials/{{$ts->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $testimonials->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $testimonials->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection