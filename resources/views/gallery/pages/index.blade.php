@extends('gallery.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-primary">
    <h2><span class="card-category">{{ __('gallery') }} </span> 
    <a href="http://localhost/TheKateRestuarant/public/gallery/create" class="btn btn-default pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
    <table class="table table-condensed table-bordered  table-striped" >
        <thead>
            <tr class="tr-primary">
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>PageId</th>
			  <th>Image Displayed</th>
              <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($gallery)
            @foreach($gallery as $gy)
            <tr>
				<td>{{$gy->id}}</td>
				<td>{{$gy->name}}</td>
                <td>{{$gy->description}}</td>
				<td>{{$gy->pageId}}</td>
                <td>{{$gy->image}}</td>
                <td>
					<a href="gallery/{{$gy->id}}"  id="edit-btn" class="btn btn-primary ">Edit</a>
				</td>
				<td class="frm">
					<a href="gallery/{{$gy->id}}"  id="delete-btn" class="btn btn-danger ">Delete</a>
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
		<td colspan="2" class="footnotes"></td>
		<td colspan="3" class="footnotes">{{ $gallery->links() }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $gallery->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection