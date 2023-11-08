@extends('menus.pages.Index',['subPage' => 'mains'])

@section('body')
<div class ="col-lg-12 col-md-12 ">

     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Mains') }} </span>
    <a href="http://localhost/LawFirmApp/public/menus/mains/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Mtable">
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

	@if($mains)
            @foreach($mains as $ma)
            <tr>
				<td>{{$ma->id}}</td>
				<td>{{$ma->type}}</td>
                <td>{{$ma->name}}</td>
				<td>{{$ma->description}}</td>
                <td>{{$ma->price}}</td>
                <td>{{$ma->image}}</td>				
                <td>
					<a href="menus/mains/{{$ma->id}}"  id="edit-btn" class="btn btn-primary ">Edit</a>
				</td>
				<td class="frm">
					<a href="menus/mains/{{$ma->id}}"  id="delete-btn" class="btn btn-danger ">Delete</a>
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
		<td colspan="4" class="footnotes">{{ $mains->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $mains->currentPage()}}</span></td>
	</tr>
</tfoot>


    </table>
 </div>   
</div>
</div>
</div>
@endsection