@extends('messages.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">


     <div class="card">
	 
	<div class="card-header header-danger">
	<h2><span class="card-category">{{ __('Messages') }} </span>
    <a href="{{config('app.url')}}/emails" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
			  <th>Message</th>	  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($messages)
            @foreach($messages as $ms)
            <tr>
				<td>{{$ms->id}}</td>
				<td>{{$ms->name}}</td>
                <td>{{$ms->email}}</td>
				<td>{{$ms->subject}}</td>
                <td>{{$ms->message}}</td>				
                <td>
					<a href="messages/{{$ms->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $messages->links() }}</td>
		<td colspan="1" class="footnotes"><span>Current Page:{{ $messages->currentPage()}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection