<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use App\Models\MailSubscription;
use App\Models\User;
use App\Notifications\MailSubscriptionReceived;
use App\Notifications\MailSubscriptionConfirmed;
use App\Notifications\MailSubscriptionCancelled;

class MailSubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if($request->has('search_text')){	
		    try{
				$mailSubscriptions = MailSubscription::Search($request->search_text)->simplePaginate(15);//Get all MailSubscriptions
				return View('mailSubscriptions.pages.index',compact('mailSubscriptions'));
				
			}catch(Exception $e){
				return View('mailSubscriptions.pages.index');
		    }
		}else{
		    try{
				$mailSubscriptions = MailSubscription::latest()->simplePaginate(15);//Get all MailSubscriptions
				return View('mailSubscriptions.pages.index',compact('mailSubscriptions'));
				
			}catch(Exception $e){
				return View('mailSubscriptions.pages.index');
		    } 
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return	View('mailSubscriptions.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try{
			$mailSubscription = new MailSubscription();
			$data = $this->validate($request, [
				'email'=>'required|email|unique:mail_subscriptions|max:60',
				'status'=>'required|max:30',
				
			]);
			
			$mailSubscription->saveMailSubscription($data);
			$user = User::find(1);
			
			Notification::send( $mailSubscription, new MailSubscriptionReceived($mailSubscription));
				
			//Notification::route('mail', $data['email'])
			//	->notify(new MailSubscriptionReceived($mailSubscription));
			
			$response = Response::json(['success' => ['message' => 'MailSubscription has been created successfully.','data' => $mailSubscription,] ], 201); 
			
			return  $response;				
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'MailSubscription cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		try{
			$mailSubscription = MailSubscription::findOrFail($id); //Find MailSubscription of id = $id
			$status = '200';
			return View('mailSubscriptions.pages.show',compact('mailSubscription','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'MailSubscription cannot be found.'] ], 404);
			
			return 	$response;
	   }		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		try{		
			$mailSubscription = MailSubscription::where('id', $id)->first(); //Find the first result where MailSubscription id = $id
			$status = '200';
			return View('mailSubscriptions.pages.edit',compact('mailSubscription','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'MailSubscription cannot be found.'] ], 404);
			
			return 	$response;
	   }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		try{
			$mailSubscription = new MailSubscription();
			$data = $this->validate($request, [
				'email'=>'required|email|unique:mail_subscriptions|max:60',
				'status'=>'required|max:30',				
			]);
		    $data['id'] = $id;
			
			$mailSubscription->updateMailSubscription($data);
			
			if($data['status'] == 'active'){
				
			Notification::send( $mailSubscription, new MailSubscriptionConfirmed($mailSubscription));
			
			//Notification::route('mail', $data['email'])
			//	->notify(new MailSubscriptionConfirmed($mailSubscription));
			
			}else {
			Notification::send( $mailSubscription, new MailSubscriptionCancelled($mailSubscription));
			
			//Notification::route('mail', $data['email'])
			//	->notify(new MailSubscriptionCancelled($mailSubscription));				
			}
			
			$response = Response::json(['success' => ['message' => 'MailSubscription has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'MailSubscription cannot be updated, validation error!'] ], 422);
			
			return 	$response;		
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		try{
			$mailSubscription = MailSubscription::findOrFail($id); //Find MailSubscription of id = $id
			$mailSubscription->delete();		
			
			$response = Response::json(['success' => ['message' => 'MailSubscription  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'MailSubscription cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
