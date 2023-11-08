@extends('reports.Index')

@section('body')

<div class="col-md-10 col-md-offset-1">
	<div class="card">
		<div class="card-header header-primary">
			<h2><span class="card-category text-white">{{ __('Create') }} </span>
			<span class="card-category">{{ __('Messages Report') }} </span></h2>
		</div>
		<div class="card-body">
			<form class="form-horizontal singleForm" id="messagesReports-form1" method="post" action="messagesReports" data-parsley-validate >
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
					<label for="fromdate" class="col-sm-2 control-label">From Date:</label>
					<div class="col-sm-4">
					  <input id="fromdate" type="date"  class="form-control" name="fromdate" required>
					</div>
					  <label for="todate" class="col-sm-2 control-label">To Date:</label>
					<div class="col-sm-4">
					  <input id="todate" type="date"  class="form-control" name="todate" required>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<label for="subject" class="col-sm-2 control-label">Subject:</label>
					<div class="col-sm-10">
						<input id="subject" type="text"  class="form-control" name="subject"  required>
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
