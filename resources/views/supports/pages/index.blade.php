@extends('supports.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Supports') }} </span> 
    <a href="{{config('app.url')}}/supports/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Type</th>
              <th>Title</th>
              <th>Question</th>				  
              <th>Answer</th>
              <th>Video</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($supports)
            @foreach($supports as $sp)
            <tr>
				<td>{{$sp->id}}</td>
				<td>{{$sp->type}}</td>
                <td>{{$sp->title}}</td>
				<td>{{$sp->question}}</td>					
				<td>{{$sp->answer}}</td>
				<td>{{$sp->video}}</td>				
                <td>
					<a href="supports/{{$sp->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="2" class="footnotes">{{ $supports->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $supports->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection