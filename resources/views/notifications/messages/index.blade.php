@extends('notifications.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
    <div class="card">
	 
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Notifications') }} </span>
		</div>

		<div class="card-body">
			<div class ="table-responsive" id = "Stable">
				<table class="table table-condensed table-striped" >
					<thead>
						<tr class="tr-danger">
						  <th>Notification Type</th>						
						  <th>Message ID</th>
						  <th>Message Email</th>
						  <th>Message Subject</th>						  
						  <th>Received At</th>
						</tr>
					</thead>
					<tbody>			
						
							@if($user->unreadNotifications)
									@foreach($user->unreadNotifications as $notification)
										<tr>
											<td>{{$notification->type}}</td>														
											<td>{{$notification->data['message_id']}}</td>
											<td>{{$notification->data['message_email']}}</td>
											<td>{{$notification->data['message_subject']}}</td>											
											<td>{{$notification->created_at}}</td>	
												{{$notification->markAsRead();}}
										</tr>														
									@endforeach
						
							@else	
								<tr>
									<li colspan="10"><p class="errortext">No Notifications Present</p></li>
								</tr>

							@endif
						</tbody>	
				</table>
			</div>   
		</div>
	</div>
</div>
@endsection