@extends('reports.Index')

@section('body')

    <div class="col-md-10 col-md-offset-1 bg-white">
        <h3 class="text-center text-danger">Projects Report Preview </h3>
        <hr>
		<form class="form-horizontal" id="projectreports-form2" method="post" action="pdfreport" data-parsley-validate>
			<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" value="{{$data['id']}}" name="id" id="id" />					
					<input type="hidden" value="{{$data['status']}}" name="status" id="status" />					
				<label for="title" class="col-sm-2 control-label">Report Title:</label>
				<div class="col-sm-10">
					<input id="title" type="text"  class="form-control" autofocus name="title" value="{{$data['title']}}"  required>
				</div>
			</div>
			 <div class="form-group">
				<label for="subtitle" class="col-sm-2 control-label">Sub Title:</label>
				<div class="col-sm-10">
				  <input id="subtitle" type="text"  class="form-control" autofocus name="subtitle" value="{{$data['subtitle']}}"  required>
				</div>
			</div> 
			<div class="form-group">
				<label for="sdate" class="col-sm-2 control-label">Start Date:</label>
				<div class="col-sm-4">
				  <input id="sdate" type="date"  class="form-control" name="sdate" value="{{$data['sdate']}}"  required >
				</div>
				  <label for="edate" class="col-sm-2 control-label">End Date:</label>
				<div class="col-sm-4">
				  <input id="edate" type="date"  class="form-control" name="edate" value="{{$data['edate']}}"  required >
				</div>
			</div>
			<hr>
			<div class ="table-responsive">
				<table class="table table-condensed table-bordered  table-striped" >
					<thead>
						<tr>
						  <th>ID</th>
						  <th>Name</th>
						  <th>Staus</th>
						  <th>Start Date</th>
						  <th>End Date</th>			  
						</tr>
					</thead>
					<tbody>

						@if($projects)
									@foreach($projects as $pj)
						<tr>
							<td>{{$pj->id}}</td>
							<td>{{$pj->name}}</td>
							<td>{{$pj->status}}</td>
							<td>{{$pj->sdate}}</td>
							<td>{{$pj->edate}}</td>				
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

						</tr>
					</tfoot>
				</table>
				<hr>
				<div id="b-element" class="form-group text-center">
					<div class="col-sm-12">
					  <button type="submit" class="btn btn-success btn-lg col-md-3 "  id="submit" name="create">CreatePdf <div class="fa fa-save text-white"></div></button>				
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-md-3" id="cancel" name="cancel">Cancel <div class="fa fa-remove text-white"></div></a>
					</div>
				</div>
			</div>

        </form>
    </div>
@endsection