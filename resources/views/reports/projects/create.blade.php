@extends('reports.Index')

@section('body')

<div class="col-md-10 col-md-offset-1">
	<div class="card">
		<div class="card-header header-primary">
			<h2><span class="card-category text-white">{{ __('Create') }} </span>
			<span class="card-category">{{ __('Projects Report') }} </span></h2>
		</div>
		<div class="card-body">
			<form class="form-horizontal singleForm" id="projectsReports-form1" method="post" action="projectsReports" data-parsley-validate >
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<label for="title" class="col-sm-2 control-label">Report Title:</label>
					<div class="col-sm-10">
						<input id="title" type="text"  class="form-control" autofocus name="title"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="subtitle" class="col-sm-2 control-label">Sub Title:</label>
					<div class="col-sm-10">
					  <input id="subtitle" type="text"  class="form-control" autofocus name="subtitle"  required>
					</div>
				</div> 
				<div class="form-group">				
					<label for="sdate" class="col-sm-2 control-label">Start Date:</label>
					<div class="col-sm-4">
					  <input id="sdate" type="date"  class="form-control" name="sdate" required>
					</div>
					  <label for="edate" class="col-sm-2 control-label">End Date:</label>
					<div class="col-sm-4">
					  <input id="edate" type="date"  class="form-control" name="edate" required>
					</div>
				</div>
				<div class="form-group">
				  <label for="status" class="col-sm-2 control-label">Status:</label>
					<div class="col-sm-4">
					  <select class="form-control" name="status" >
							<option value="N/A"> N/A </option>					  
							<option value="active ">pending</option>
							<option value="cancelled ">incomplete</option>
							<option value="cancelled ">completed</option>							
					  </select> 
					</div>
				</div> 
				<hr>
				<div id="b-element" class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-success btn-lg col-sm-4" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-4 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-remove text-white"></div></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> 

@endsection
