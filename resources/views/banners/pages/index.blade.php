@extends('banners.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Banners') }} </span> 
    <a href="{{config('app.url')}}/banners/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped">
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Heading</th>
              <th>SubHeading</th>			  
              <th>Body</th>
              <th>PageId</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($banners)
            @foreach($banners as $bn)
            <tr>
				<td>{{$bn->id}}</td>
				<td>{{$bn->heading}}</td>
				<td>{{$bn->subheading}}</td>				
                <td>{{$bn->body}}</td>
				<td>{{$bn->pageId}}</td>			
                <td>
					<a href="banners/{{$bn->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $banners->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $banners->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection