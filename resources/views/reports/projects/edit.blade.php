@extends('reports.Index')

@section('body')

<div class="col-md-10 col-md-offset-1">
	<div class="card">
		<div class="card-header header-primary">
			<h2><span class="card-category text-white">{{ __('Edit') }} </span>
			<span class="card-category">{{ __('Projects Report') }} </span></h2>
		</div>
		<div class="card-body">
			<form class="form-horizontal singleForm" id="projectreports-form1" method="post" action="projectsReports" data-parsley-validate >
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" id="id" value="{{$projectsReport->id}}" name="id" />
					<input type="hidden" id="subsquery" value="{{$projectsReport->subsquery}}" name="subsquery" />					
					<label for="title" class="col-sm-2 control-label">Report Title:</label>
					<div class="col-sm-10">
						<input id="title" type="text"  class="form-control" autofocus name="title" value="{{$projectsReport->title}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="subtitle" class="col-sm-2 control-label">Sub Title:</label>
					<div class="col-sm-10">
					  <input id="subtitle" type="text"  class="form-control" autofocus name="subtitle" value="{{$projectsReport->subtitle}}" required>
					</div>
				</div> 	
				<div class="form-group">				
					<label for="from_date" class="col-sm-2 control-label">From Date:</label>
					<div class="col-sm-4">
					  <input id="sdate" type="date"  class="form-control" name="sdate" value="{{$projectsReport->sdate}}" required>
					</div>
					  <label for="to_date" class="col-sm-2 control-label">To Date:</label>
					<div class="col-sm-4">
					  <input id="edate" type="date"  class="form-control" name="edate" value="{{$projectsReport->edate}}" required>
					</div>
				</div>
				<div class="form-group">
				  <label for="status" class="col-sm-2 control-label">Status:</label>
					<div class="col-sm-4">
					<select class="form-control" name="status" >					
					@if($projectsReport->status == "pending")
							<option value="N/A"> N/A </option>					  
							<option value="pending" selected>pending</option>
							<option value="incomplete">incomplete</option>
							<option value="completed">completed</option>
					  @elseif ($projectsReport->status == "incomplete")
							<option value="N/A"> N/A </option>					  
							<option value="pending">pending</option>
							<option value="incomplete" selected>incomplete</option>
							<option value="completed">completed</option>
					  @elseif ($projectsReport->status == "completed")
							<option value="N/A"> N/A </option>					  
							<option value="pending">pending</option>
							<option value="incomplete">incomplete</option>
							<option value="completed" selected>completed</option							
					  @else 
							<option value="N/A" selected> N/A </option>					  
							<option value="pending">pending</option>
							<option value="incomplete">incomplete</option>
							<option value="completed">completed</option>							
					  @endif
					  </select>
					</div>
				</div> 
				<hr>
				<div id="b-element" class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary btn-lg btn-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg btn-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-remove text-white"></div></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> 

@endsection
