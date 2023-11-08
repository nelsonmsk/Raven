<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Exception;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use App\Models\MailSubscription;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\User;

class NotificationsController extends Controller
{
	
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		try {

			 /**
			 * Get a listing of the user's message notifications.
			 */
			$user_id = Auth::user()->id;
			$user_email = Auth::user()->email;			
			$user = User::find($user_id);
			
			$unread_messages = $user->unreadNotifications()->count();
			
			$mail_subscribers = MailSubscription::all();
			
			 /**
			 * Get a listing of the user's message notifications.
			 */
			
			$received_mailsubs = 0;			 
			$confirmed_mailsubs = 0; 
			$cancelled_mailsubs = 0;
			
			foreach ($mail_subscribers as $subscriber) {
				if($subscriber->notifications){
					
					$received_subs = $subscriber->unreadNotifications()->where('type', 'App\Notifications\MailSubscriptionReceived')->count();
					$confirmed_subs = $subscriber->unreadNotifications()->where('type', 'App\Notifications\MailSubscriptionConfirmed')->count();
					$cancelled_subs = $subscriber->unreadNotifications()->where('type', 'App\Notifications\MailSubscriptionCancelled')->count();

					$received_mailsubs += $received_subs;
					$confirmed_mailsubs += $confirmed_subs;				
					$cancelled_mailsubs += $cancelled_subs;
					
				}else{
							$received_mailsubs += 0;
							$confirmed_mailsubs += 0;	
							$cancelled_mailsubs += 0;
				}
			}
			
			
			
			$notifications_combo = [
			
					'unread_messages' => $unread_messages,
					'received_mailsubs' => $received_mailsubs,
				   'confirmed_mailsubs' => $confirmed_mailsubs,						
				   'cancelled_mailsubs' => $cancelled_mailsubs,					
			];			
			
			$response = Response::json(['notifications_combo' => $notifications_combo ], 200); 
			
			return  $response;							
		  
	  
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Notifications cannot be found.'] ], 404);
			
			return 	$response;
		} 	
	}
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		try {
			
				$user_id = Auth::user()->id;			
				$user = User::find($user_id);		
				$mail_subscribers = MailSubscription::all();	
				
				if ($id == 1){ 
						//$notifications = $user->unreadNotifications();							
						return View('notifications.messages.index',compact('user'));							
				}else {		
				
					return View('notifications.mailSubscriptions.index',compact('mail_subscribers','id'));						
				} 
							
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Notifications cannot be displayed.'] ], 404);
			
			return 	$response;
		} 	
	}	
	
}
