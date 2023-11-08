@extends('reports.Index')

@section('body')

<div class="col-md-10 col-md-offset-1">
	<div class="card">
		<div class="card-header header-primary">
			<h2><span class="card-category text-white">{{ __('Edit') }} </span>
			<span class="card-category">{{ __('Customers Report') }} </span></h2>
		</div>
		<div class="card-body">
			<form class="form-horizontal singleForm" id="subsreports-form1" method="post" action="customersReports" data-parsley-validate >
				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" id="id" value="{{$customersReport->id}}" name="id" />
					<input type="hidden" id="subsquery" value="{{$customersReport->subsquery}}" name="subsquery" />					
					<label for="title" class="col-sm-2 control-label">Report Title:</label>
					<div class="col-sm-10">
						<input id="title" type="text"  class="form-control" autofocus name="title" value="{{$customersReport->title}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="subtitle" class="col-sm-2 control-label">Sub Title:</label>
					<div class="col-sm-10">
					  <input id="subtitle" type="text"  class="form-control" autofocus name="subtitle" value="{{$customersReport->subtitle}}" required>
					</div>
				</div> 	
				<div class="form-group">				
					<label for="from_date" class="col-sm-2 control-label">From Date:</label>
					<div class="col-sm-4">
					  <input id="fromdate" type="date"  class="form-control" name="fromdate" value="{{$customersReport->fromdate}}" required>
					</div>
					  <label for="to_date" class="col-sm-2 control-label">To Date:</label>
					<div class="col-sm-4">
					  <input id="todate" type="date"  class="form-control" name="todate" value="{{$customersReport->todate}}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
					<div class="col-sm-10">
					  <input id="city" type="text"  class="form-control" name="city" value="{{$customersReport->city}}" >
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="col-sm-2 control-label">{{ __('Country') }}</label>
					<div class="col-sm-10">
					  <input id="country" type="text"  class="form-control" name="country" value="{{$customersReport->country}}">
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
