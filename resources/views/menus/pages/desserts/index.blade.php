@extends('menus.pages.Index',['subPage' => 'desserts'])

@section('body')
<div class ="col-lg-12 col-md-12 ">

     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Desserts') }} </span> 
    <a href="http://localhost/LawFirmApp/public/menus/desserts/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Dtable">
    <table class="table table-condensed table-bordered  table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>Id</th>			
              <th>Type</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
			  <th>Image</th>		  
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($desserts)
            @foreach($desserts as $ds)
            <tr>
				<td>{{$ds->id}}</td>
				<td>{{$ds->type}}</td>
                <td>{{$ds->name}}</td>
				<td>{{$ds->description}}</td>
                <td>{{$ds->price}}</td>
                <td>{{$ds->image}}</td>				
                <td>
					<a href="menus/desserts/{{$ds->id}}"  id="edit-btn" class="btn btn-primary ">Edit</a>
				</td>
				<td class="frm">
					<a href="menus/desserts/{{$ds->id}}"  id="delete-btn" class="btn btn-danger ">Delete</a>
				</td>
            </tr>
            @endforeach
 	@else
	<tr>
	<td colspan="10"><p class="errortext">No record present</p></td>
	<td>{{$e->message}}</td>
	</tr>

	@endif

        </tbody>
<tfoot>
 	<tr>
		<td colspan="3" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $desserts->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $desserts->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection