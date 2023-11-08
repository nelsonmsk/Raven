@extends('reports.Index')

@section('body')

    <div class="col-md-10 col-md-offset-1 bg-white">
        <h3 class="text-center text-danger">Messages Report Preview </h3>
        <hr>
		<form class="form-horizontal" id="subsreports-form2" method="post" action="pdfreport" data-parsley-validate>
			<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" value="{{$data['id']}}" name="id" id="id" />					
					<input type="hidden" value="{{$data['subject']}}" name="subject" id="subject" />					
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
				<label for="fromdate" class="col-sm-2 control-label">From Date:</label>
				<div class="col-sm-4">
				  <input id="fromdate" type="date"  class="form-control" name="fromdate" value="{{$data['fromdate']}}"  required >
				</div>
				  <label for="todate" class="col-sm-2 control-label">To Date:</label>
				<div class="col-sm-4">
				  <input id="todate" type="date"  class="form-control" name="todate" value="{{$data['todate']}}"  required >
				</div>
			</div>
			<hr>
			<div class ="table-responsive">
				<table class="table table-condensed table-bordered  table-striped" >
					<thead>
						<tr>
						  <th>ID</th>
						  <th>Email</th>
						  <th>Subject</th>
						  <th>Created</th>
						  <th>Modified</th>			  
						</tr>
					</thead>
					<tbody>

						@if($messages)
									@foreach($messages as $mg)
						<tr>
							<td>{{$mg->id}}</td>
							<td>{{$mg->email}}</td>
							<td>{{$mg->subject}}</td>
							<td>{{$mg->created_at}}</td>
							<td>{{$mg->updated_at}}</td>				
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