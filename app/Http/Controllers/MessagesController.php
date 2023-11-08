<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Message;
use App\Notifications\MessageReceived;

class MessagesController extends Controller
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
				$messages = Message::Search($request->search_text)->simplePaginate(15);//Get all Messages
				$status = '200';
				return View('messages.pages.index',compact('messages','status'));
				
			}catch(Exception $e){
				return View('messages.pages.index');
			} 
		}else{	
			try{
				$messages = Message::latest()->simplePaginate(15);//Get all Messages
				$status = '200';
				return View('messages.pages.index',compact('messages','status'));
				
			}catch(Exception $e){
				return View('messages.pages.index');
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
			return View('messages.pages.create');
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
			$message = new Message();
			$data = $this->validate($request, [
				'name'=>'required|max:120',
				'email'=>'required|email|unique|max:120',
				'subject'=>'required',
				'message'=>'required|250',

			]);
		   
			$message->saveMessage($data);
			$user = User::find(1);
			
			//Notification::send( $user, new MessageReceived($message));			
			
			$response = Response::json(['success' => ['message' => 'Message has been sent successfully.','data' => $message,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Message cannot be sent, validation error!'] ], 422);
			
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
			$message = Message::findOrFail($id); //Find Message of id = $id
			$status = '200';
			return View('messages.pages.show',compact('message','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Message cannot be found.'] ], 404);
			
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
			$message = Message::where('id', $id)->first(); //Find the first result where Message id = $id
			$status = '200';
			return View('messages.pages.edit',compact('message','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Message cannot be found.'] ], 404);
			
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
			$message = new Message();
			$data = $this->validate($request, [
				'name'=>'required|max:120',
				'email'=>'required|email|unique|max:120',
				'subject'=>'required',
				'message'=>'required|250',
				
			]);
		    $data['id'] = $id;
			
			$message->updateMessage($data);
			
			$response = Response::json(['success' => ['message' => 'Message has been updated.','data' => $message,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Message cannot be updated, validation error!'] ], 422);
			
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
			$message = Message::findOrFail($id); //Find Message of id = $id	
			$message->delete();
	
			$response = Response::json(['success' => ['message' => 'Message has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Message cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
