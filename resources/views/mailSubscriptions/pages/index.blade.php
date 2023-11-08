@extends('mailSubscriptions.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('MailSubscriptions') }} </span> 
    <a href="{{config('app.url')}}/mailSubscriptions/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($mailSubscriptions)
            @foreach($mailSubscriptions as $sb)
            <tr>
				<td>{{$sb->id}}</td>
				<td>{{$sb->email}}</td>
                <td>{{$sb->status}}</td>
                <td>
					<a href="mailSubscriptions/{{$sb->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="2" class="footnotes">{{ $mailSubscriptions->links() }}</td>
		<td colspan="1" class="footnotes"><span>Current Page:{{ $mailSubscriptions->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection