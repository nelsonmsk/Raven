@extends('users.Index')

@section('body')
        <div class="col-md-12">
            <div class="card">
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Users') }} </span> 
    <a href="{{config('app.url')}}/users/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
			  <th>Type</th>
              <th>Date/Time Added</th>			  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($users)
            @foreach($users as $ur)
            <tr>
				<td>{{$ur->id}}</td>
				<td>{{$ur->name}}</td>
                <td>{{$ur->email}}</td>
				<td>{{$ur->type}}</td>
				<td>{{$ur->created_at}}</td>			
                <td>
					<a href="users/{{$ur->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="3" class="footnotes">{{ $users->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $users->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection