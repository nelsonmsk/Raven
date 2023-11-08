<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MailSubscriptionConfirmed;

use App\Models\MailSubscription;
use App\Models\User;

class SubscriptionConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$users = User::all();
 			$order = MailSubscription::first();
			
			//return Notification::send($users, new MailSubscriptionConfirmed($order));		
			return (new MailSubscriptionConfirmed($order))
				->toMail($order->username);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$users = User::all();
 			$order = MailSubscription::first();
			
			//return Notification::send($users, new MailSubscriptionConfirmed($order));		
			return (new MailSubscriptionConfirmed($order))
				->toMail($order->username);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try {
			//$mailPost = new MailPost();
			$data = $this->validate($request, [
				'to'=>'required|email|max:60',
				'cc'=>'required|email|max:60',
				'subject'=>'required|max:60',
				'message'=>'required|max:250',
			]);
			
			$order = MailSubscription::findOrFail($request->id);
			
			// Ship the order...
	
				
		return	Notification::send("nelson@g.com", new MailSubscriptionConfirmed($order));
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Mail cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
	}


    /**
     * Preview a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
		try {
			$user = User::find(2);
 			$order = MailSubscription::first();
							
			
			//Notification::send($user, new MailSubscriptionConfirmed($order));
			//$user->notifications()->delete();	
			
						
			return (new MailSubscriptionConfirmed($order))
				->toArray($order);	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Notification cannot be created, validation error!'] ], 422);
			
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
 			$order = MailSubscription::findOrFail($id);
			
			return new MailSubscriptionConfirmed($order);		
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
				$user = MailSubscription::find(3);
				$user->notifications()->delete();			
    }
}
