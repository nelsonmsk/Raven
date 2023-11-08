@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-primary">
				<h2>Projects</h2>
            </div>
            <div class="dashboard-card-body">
              <p class="card-title">Total Projects.<span class="badge badge-lg header-primary">+ {{$dashboard ?  $dashboard['projectsTotal']:'0'}}</span></p></br>		  		  
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">Last Updated: </i><span class="tr-primary">  {{$dashboard ?  $dashboard['projectsUpdate']:'0 weeks ago'}}</span>
              </div>
            </div>			
          </div>
        </div>	  
        <div class="col-md-3 col-sm-3">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-dark">
              <h2>Clients</h2>
            </div>
            <div class="dashboard-card-body">
              <p class="card-title">New Clients.<span class="badge badge-lg header-dark">+  {{$dashboard ?  $dashboard['clientsTotal']:'0'}}</span></p></br>
           </div>
			<div class="card-footer">
              <div class="stats">
                <i class="material-icons">Last Updated: </i><span class="tr-dark"> {{$dashboard ?  $dashboard['last_client_update']:'0 days ago'}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-5">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-danger">
				<h2>Messages</h2>
            </div>
            <div class="dashboard-card-body">
              <p class="card-title">New Messages<span class="badge badge-lg header-danger">+ {{$dashboard ?  $dashboard['messagesTotal']:'0'}} </span></p></br>
			  </div>
			<div class="card-footer">
              <div class="stats">
                <i class="material-icons">Last Received:</i> <span class="tr-danger"> {{$dashboard ?  $dashboard['messagesUpdate']:'0 days ago'}} </span>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-md-3 col-sm-5">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-success">
				<h2>Subscribers</h2>
            </div>
            <div class="dashboard-card-body">
              <p class="card-title">New Subscribers:<span class="badge badge-lg header-success">+ {{$dashboard ?  $dashboard['mailSubscriptions_total']:'0'}} </span></p></br>
			</div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">Updated:</i> <span class="tr-success"> {{$dashboard ?  $dashboard['mailSubscriptions_update']:'0'}}</span>
              </div>
            </div>			
          </div>
        </div>
    </div>
	  
	  
	   <div class="row ">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-primary">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
	             <div class="dashboard-card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category text-default">
                <span class=""><i class="fa fa-long-arrow-up"></i>  {{$dashboard ?  $dashboard['msChange']:'0'}} </span>% increase in today subscriptions.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time:</i> updated {{$dashboard ?  $dashboard['mailsubUpdate']:'0 minutes ago'}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-dark">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="dashboard-card-body">
              <h4 class="card-title">Happy Clients</h4>
              <p class="card-category  text-default">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time:</i>updated  {{$dashboard ?  $dashboard['last_client_update']:'0 days ago'}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="dashboard-card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="dashboard-card-body">
              <h4 class="card-title">Completed Projects</h4>
              <p class="card-category  text-default">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time:</i> campaign sent {{$dashboard ?  $dashboard['pcompletedUpdate']:'0 days ago'}} 
              </div>
            </div>
          </div>
        </div>
    </div> 
	  
	    
	  
      <div class="row card-chart">
        <div class="col-lg-8 col-md-12 col-lg-offset-2">
          <div class="card">
            <div class="dashboard-card-header header-purple">
              <h2>Newsletters Published</h2>
			  <h5> for this month</h5>
            </div>
            <div class="card-body table-responsive">
				<table class="table table-striped">
					<thead>
						<tr class="text-default">
						  <th>ID</th>
						  <th>Title</th>
						  <th>Type</th>
						  <th>Created_By</th>
						  <th>Published Date</th>
						</tr>
					</thead>			
					<tbody>
						@if($newsletters)
							@foreach($newsletters as $nl)
								<tr>
									<td>{{$nl->id}}</td>
									<td>{{$nl->title}}</td>
									<td>{{$nl->type}}</td>
									<td>{{$nl->created_by}}</td>
									<td>{{$nl->published_date}}</td>			
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5"><p class="errortext">No record present</p></td>
							</tr>

						@endif							
					</tbody>				  
				</table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush