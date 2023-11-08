@extends('emails.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-success">
    <h2><span class="card-category">{{ __('Mail') }} </span> 
    <a href="{{config('app.url')}}/emails/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>To</th>
              <th>Cc</th>			  
              <th>From</th>
              <th>Subject</th>	
              <th>Status</th>				  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($mailPosts)
            @foreach($mailPosts as $mp)
            <tr>
				<td>{{$mp->id}}</td>
				<td>{{$mp->to}}</td>
                <td>{{$mp->cc}}</td>
				<td>{{$mp->from}}</td>
				<td>{{$mp->subject}}</td>
				<td>{{$mp->status}}</td>	
				<td>{{$mp->subject}}</td>
				<td>{{$mp->status}}</td>				
                <td>
					<a href="emails/{{$mp->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $mailPosts->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $mailPosts->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection