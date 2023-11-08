<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use Auth;
use Carbon\Carbon;

use App\Models\MailSubscription;
use App\Models\MailPost;
use App\Models\Message;
use App\Models\Client;
use App\Models\Project;
use App\Models\AppDefaults;
use App\Models\User;
use App\Models\Newsletter;


class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
 
    * @return void
     */

    /**
     * Show the application dashboard.
     *

     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      try{
		  
		 $date = Date("Y-m-d");
		 $daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays();		  
		 //  Carbon::now()->subMinutes(2)->locale('en_US')->diffForHumans; // '2 minutes ago'
		 
			//Get Project total count
			$projectsTotal = Project::count();
			//Get Project Update diffInWeeks
			$projects_update = Project::max('created_at');	
			$projects_update_diff  = Carbon::createFromDate($projects_update)->diffInWeeks();
				if($projects_update_diff < 2 ){
					$projects_update_diff2  = Carbon::createFromDate($projects_update)->diffInDays();
						if($projects_update_diff2 < 2 ){
							$projects_update_diff3  = Carbon::createFromDate($projects_update)->diffInHours();
								if($projects_update_diff3 < 2 ){
										$projects_update_diff4  = Carbon::createFromDate($projects_update)->diffInMinutes();
										$projectsUpdate = $projects_update_diff4. ' mins ago';										
								}else{
									$projectsUpdate = $projects_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$projectsUpdate = $projects_update_diff2. ' days ago';
						}	
				}else{
					$projectsUpdate = $projects_update_diff. ' weeks ago';
				}	
			//Get Project Completed Update diffInWeeks
			$projects_completed = Project::where('status', 'completed')
											->max('updated_at');
			$pcompleted_update_diff  = Carbon::createFromDate($projects_completed)->diffInWeeks();
				if($pcompleted_update_diff < 2 ){
					$pcompleted_update_diff2  = Carbon::createFromDate($projects_completed)->diffInDays();
						if($pcompleted_update_diff2 < 2 ){
							$pcompleted_update_diff3  = Carbon::createFromDate($projects_completed)->diffInHours();
								if($pcompleted_update_diff3 < 2 ){
										$pcompleted_update_diff4  = Carbon::createFromDate($projects_completed)->diffInMinutes();
										$pcompletedUpdate = $pcompleted_update_diff4. ' mins ago';										
								}else{
									$pcompletedUpdate = $pcompleted_update_diff3. ' hours ago';									
								}							
														
						}else{	
							$pcompletedUpdate = $pcompleted_update_diff2. ' days ago';
						}	
				}else{
					$pcompletedUpdate = $pcompleted_update_diff. ' weeks ago';
				}											
			$projectsIncomplete = Project::where('status', 'incomplete')
												->whereDate('edate', $date)	
												->count();				
			$projectsPending = Project::where('status', 'pending')
												->whereDate('edate', $date)	
												->count();		 


			//No: clients in the last 3 months
			$cli_date = Carbon::now()->subMonth(3); 
			$clientsTotal = Client::whereBetween('created_at', [$cli_date, $date])	
										->count();
			//Last clients data update diffInDays
			$client_update = Client::max('created_at');												
			$client_update_diff = Carbon::createFromDate($client_update)->diffInWeeks(); 
				if($client_update_diff < 2 ){
					$client_update_diff2  = Carbon::createFromDate($client_update)->diffInDays();
						if($client_update_diff2 < 2 ){
							$client_update_diff3  = Carbon::createFromDate($client_update)->diffInHours();
								if($client_update_diff3 < 2 ){
										$client_update_diff4  = Carbon::createFromDate($client_update)->diffInMinutes();
										$last_client_update = $client_update_diff4. ' mins ago';										
								}else{
									$last_client_update = $client_update_diff3. ' hours ago';									
								}							  							
						}else{	
							$last_client_update = $client_update_diff2. ' days ago';
						}	
				}else{
					$last_client_update = $client_update_diff. ' weeks ago';
				}
	
	
			//Get New Messages Total count
			$messagesTotal = Message::whereDate('created_at', $date)
									->count();		
			//Get Messages Last created time						
			$messages_update = Message::max('created_at');									
			$messages_update_diff  = Carbon::createFromDate($messages_update)->diffInDays();	
				if($messages_update_diff < 2 ){
					$messages_update_diff2  = Carbon::createFromDate($messages_update)->diffInHours();
						if($messages_update_diff2 < 2 ){
							$messages_update_diff3  = Carbon::createFromDate($messages_update)->diffInMinutes();
							$messagesUpdate = $messages_update_diff3. ' mins ago';							
						}else{	
							$messagesUpdate = $messages_update_diff2. ' hours ago';
						}	
				}else{
					$messagesUpdate = $messages_update_diff. ' days ago';
				}


	
			//Get New Subscribers Total count
			$mailSubscriptions_total = MailSubscription::whereDate('created_at', $date)
											->count(); 	
			//Get Last Update time
			$mailSubscriptions_update = MailSubscription::max('created_at');
			$mailSubscriptionsCancelled = MailSubscription::where('status', 'cancelled')
												->whereDate('created_at', $date)											
												->count();									
			$mailSubscriptionsActive = MailSubscription::where('status', 'active')
												->whereDate('created_at', $date)	
												->count();
			//Calculate the % change in the no: of mailsubscriptions
			$d0 = Carbon::now();
			$ms0 = MailSubscription::whereDate('created_at', $d0)
									->count();
			$d1 = Carbon::now()->subDay(1);								
			$ms1 = MailSubscription::whereDate('created_at', $d1)
									->count();						
				if ($ms0 == 0 && $ms1 == 0)	{
					$msChange = 0;
				}else{
					$msChange = ($ms0 /($ms0 + $ms1) ) * 100 ; 									
				}
			//Get MailSubscriptions Last updated time						
			$mailsub_update = MailSubscription::where(function ($query) {
												$query->where('status','pending')
													->orWhere('status', 'active');
												})->max('created_at');									
			$mailsub_update_diff  = Carbon::createFromDate($mailsub_update)->diffInDays();	
				if($mailsub_update_diff < 2 ){
					$mailsub_update_diff2  = Carbon::createFromDate($mailsub_update)->diffInHours();
						if($mailsub_update_diff2 < 2 ){
							$mailsub_update_diff3  = Carbon::createFromDate($mailsub_update)->diffInMinutes();
							$mailsubUpdate = $mailsub_update_diff3. ' mins ago';							
						}else{	
							$mailsubUpdate = $mailsub_update_diff2. ' hours ago';
						}	
				}else{
					$mailsubUpdate = $mailsub_update_diff. ' days ago';
				}				
				
			//Get Newsletters sent to subscribers this month
			$this_month = Carbon::now()->month;
			$newsletters = Newsletter::where('status','sent')
									  ->whereMonth('published_date',$this_month)
									  ->get();
				
				
			$dashboard = [
				'clientsTotal' => $clientsTotal,
				'last_client_update' => $last_client_update,				
				'messagesTotal' => $messagesTotal,
				'messagesUpdate' => $messagesUpdate,
				'mailSubscriptions_total' => $mailSubscriptions_total,
				'mailSubscriptions_update' => $mailSubscriptions_update,	
				'mailSubscriptionsActive' => $mailSubscriptionsActive,
				'mailsubUpdate' => $mailsubUpdate,
				'projectsTotal' => $projectsTotal,
				'projectsUpdate' => $projectsUpdate,	
				'pcompletedUpdate' => $pcompletedUpdate,
				'projectsPending' => $projectsPending,
				'msChange' => $msChange,
			];

		
			$status = "200";
		
			return View('dashboard',compact('dashboard','newsletters','status'));
			
				
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dashboard cannot be found.'] ], 404);
			
			return 	$response;
	   } 
 
   }
   
   
    public function getView()
    {
		try{
				
			//Get New Subscribers Daily Total count
			$d0 = Carbon::now();
			$ms0 = MailSubscription::whereDate('created_at', $d0)
									->count();
			$d1 = Carbon::now()->subDay(1);								
			$ms1 = MailSubscription::whereDate('created_at', $d1)
									->count();
			$d2 = Carbon::now()->subDay(2);
			$ms2 = MailSubscription::whereDate('created_at', $d2)
									->count();
			$d3 = Carbon::now()->subDay(3);								
			$ms3 = MailSubscription::whereDate('created_at', $d3)
									->count();																	
			$d4 = Carbon::now()->subDay(4);
			$ms4 = MailSubscription::whereDate('created_at', $d4)
									->count();
			$d5 = Carbon::now()->subDay(5);								
			$ms5 = MailSubscription::whereDate('created_at', $d5)
									->count();											
			$d6 = Carbon::now()->subDay(6);
			$ms6 = MailSubscription::whereDate('created_at', $d6)
									->count();	

			$msData = [
				'ms0' => $ms0,
				'ms1' => $ms1,
				'ms2' => $ms2,
				'ms3' => $ms3,
				'ms4' => $ms4,
				'ms5' => $ms5,
				'ms6' => $ms6,
			];
			  
			//Get Projects Completed Monthly Total Count			  
			$m0 = Carbon::now()->month;
			$p0 = Project::whereMonth('edate', $m0)
						->count();						
			$pd1 = Carbon::now()->subMonth(1);
			$m1 = Carbon::createFromDate($pd1)->month;			
			$p1 = Project::whereMonth('edate', $m1)
						->count();								
			$pd2 = Carbon::now()->subMonth(2);
			$m2 = Carbon::createFromDate($pd2)->month;			
			$p2 = Project::whereMonth('edate', $m2)
						->count();
			$pd3 = Carbon::now()->subMonth(3);	
			$m3 = Carbon::createFromDate($pd3)->month;			
			$p3 = Project::whereMonth('edate', $m3)
						->count();																	
			$pd4 = Carbon::now()->subMonth(4);
			$m4 = Carbon::createFromDate($pd4)->month;			
			$p4 = Project::whereMonth('edate', $m4)
						->count();
			$pd5 = Carbon::now()->subMonth(5);	
			$m5 = Carbon::createFromDate($pd5)->month;			
			$p5 = Project::whereMonth('edate', $m5)
						->count();	 
				$pData = [
				'p0' => $p0,
				'm0' => $m0,
				'p1' => $p1,
				'm1' => $m1,
				'p2' => $p2,
				'm2' => $m2,
				'p3' => $p3,
				'm3' => $m3,
				'p4' => $p4,
				'm4' => $m4,
				'p5' => $p5,
				'm5' => $m5,

			];		  
			
			return $response = Response::json(['msData' => $msData,'pData' => $pData, ], 200);
			  
			  
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dashboard cannot be found.'] ], 404);
			
			return 	$response;
	   }
	}	   

}
