@extends('reports.Index')

@section('body')

    <div class="col-md-10 col-md-offset-1 bg-white">
        <h3 class="text-center text-danger">Customers Report Preview </h3>
        <hr>
		<form class="form-horizontal" id="subsreports-form2" method="post" action="pdfreport" data-parsley-validate>
			<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" value="{{$data['id']}}" name="id" id="id" />					
					<input type="hidden" value="{{$data['city']}}" name="city" id="city" />	
					<input type="hidden" value="{{$data['country']}}" name="country" id="country" />						
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
			@if($data['city'] !== Null)
				<div class="form-group">
					<label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
					<div class="col-sm-4">
					  <input id="city" type="text"  class="form-control" name="city" value="{{$data['city']}}" >
					</div>
				</div>				
			@endif
			@if($data['country'] !== Null)
				<div class="form-group">
					<label for="country" class="col-sm-2 control-label">{{ __('Country') }}</label>
					<div class="col-sm-4">
					  <input id="country" type="text"  class="form-control" name="country" value="{{$data['country']}}">
					</div>
				</div>					
			@endif			
			
			<hr>
			<div class ="table-responsive">
				<table class="table table-condensed table-bordered  table-striped" >
					<thead>
						<tr>
						  <th>ID</th>
						  <th>Name</th>						  
						  <th>Email</th>
						  <th>Phone</th>
						  <th>Address</th>
						  <th>Created</th>
						  <th>Modified</th>			  
						</tr>
					</thead>
					<tbody>

						@if($customers)
									@foreach($customers as $sb)
						<tr>
							<td>{{$sb->id}}</td>
							<td>{{$sb->name}}</td>							
							<td>{{$sb->email}}</td>
							<td>{{$sb->phone}}</td>
							<td>{{$sb->address}}</td>
							<td>{{$sb->created_at}}</td>
							<td>{{$sb->updated_at}}</td>				
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