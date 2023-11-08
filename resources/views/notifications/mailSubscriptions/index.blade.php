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
						  <th>Subscriber ID</th>
						  <th>Subscriber Email</th>
						  <th>Received At</th>
						</tr>
					</thead>
					<tbody>			
						
							@if($mail_subscribers)
									@foreach($mail_subscribers as $subscriber)
										@if($subscriber->unreadNotifications)
												@foreach($subscriber->unreadNotifications as $notification)
													@if($id == 2 && $notification->type =='App\\Notifications\\MailSubscriptionReceived')
															<tr>
																<td>{{$notification->type}}</td>														
																<td>{{$notification->data['mailsubscription_id']}}</td>
																<td>{{$notification->data['mailsubscription_email']}}</td>
																<td>{{$notification->created_at}}</td>	
																	{{$notification->markAsRead();}}
															</tr>
													@elseif($id == 3 && $notification->type =='App\\Notifications\\MailSubscriptionConfirmed')
															</tr>
																<td>{{$notification->type}}</td>														
																<td>{{$notification->data['mailsubscription_id']}}</td>
																<td>{{$notification->data['mailsubscription_email']}}</td>
																<td>{{$notification->created_at}}</td>	
																	{{$notification->markAsRead();}}
															</tr>	
													@elseif($id == 4 && $notification->type =='App\\Notifications\\MailSubscriptionCancelled')
															<tr>
																<td>{{$notification->type}}</td>														
																<td>{{$notification->data['mailsubscription_id']}}</td>
																<td>{{$notification->data['mailsubscription_email']}}</td>
																<td>{{$notification->created_at}}</td>	
																	{{$notification->markAsRead();}}
															</tr>															
													@endif
													
												@endforeach
										@else
											<tr><td>0 New Notifications</td></tr>
										@endif
									@endforeach
						
							@else	
								<tr>
									<li colspan="10"><p class="errortext">No record present</p></li>
								</tr>

							@endif
						</tbody>	
				</table>
			</div>   
		</div>
	</div>
</div>
@endsection