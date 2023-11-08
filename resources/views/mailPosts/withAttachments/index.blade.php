@extends('profiles.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">

     <div class="card">
	 
	<div class="card-header header-danger">
	<h2><span class="card-category">{{ __('Profiles') }} </span>
    <a href="{{config('app.url')}}/profiles/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-bordered  table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
			  <th>Title</th>
			  <th>Bio</th>
			  <th>Address</th>	
			  <th>Image</th>
			  <th>Created</th>
			  <th>Updated</th>			  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($profiles)
            @foreach($profiles as $pf)
            <tr>
				<td>{{$pf->id}}</td>
				<td>{{$pf->name}}</td>
                <td>{{$pf->email}}</td>
				<td>{{$pf->phone}}</td>
                <td>{{$pf->title}}</td>
                <td>{{mb_substr($pf->bio,0,100)}}</td>
				<td>{{$pf->address}}</td>	
				<td>{{$pf->image}}</td>
				<td>{{$pf->created_at}}</td>
				<td>{{$pf->updated_at}}</td>
                <td>
					<a href="profiles/{{$pf->id}}"  id="show-btn" class="btn btn-primary ">Show</a>
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
		<td colspan="3" class="footnotes"></td>
		<td colspan="6" class="footnotes">{{ $profiles->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $profiles->currentPage()}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection