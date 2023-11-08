@extends('features.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Features') }} </span> 
    <a href="{{config('app.url')}}/features/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Title</th>
              <th>Body</th>
              <th>Icon</th>			  
              <th>PageId</th>
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($features)
            @foreach($features as $ft)
            <tr>
				<td>{{$ft->id}}</td>
				<td>{{$ft->title}}</td>
                <td>{{mb_substr($ft->body,0,100)}}</td>
				<td>{{$ft->icon}}</td>				
				<td>{{$ft->pageId}}</td>
                <td>
					<a href="features/{{$ft->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="2" class="footnotes">{{ $features->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $features->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection