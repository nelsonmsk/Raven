<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Response;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;

use App\Models\Message;
use App\Models\MailPost;
use App\Models\AppDefaults;
use App\Mail\CreateMessage;


class MailsController extends Controller
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
				$mailPosts = MailPost::Search($request->search_text)->simplePaginate(15);//Get all MailPosts
				return View('emails.messages.index',compact('mailPosts'));
				
			}catch(Exception $e){
				return View('emails.messages.index');
		   } 
		}else{
		  try{
				$mailPosts = MailPost::latest()->simplePaginate(15);//Get all MailPosts
				return View('emails.messages.index',compact('mailPosts'));
				
			}catch(Exception $e){
				return View('emails.messages.index');
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
		return	View('emails.messages.create');
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
			$mailPost = new MailPost();
			$data = $this->validate($request, [
				'to'=>'required|email|max:60',
				'cc'=>'required|email|max:60',
				'subject'=>'required|max:60',
				'message'=>'required|max:250',
			],[
				'to.required'=>'Please provide a valid receiptient email',
				'cc.required'=>'Please provide a valid cc email',			
				'subject.required'=>'Please provide a valid subject',
				'message.required'=>'Please provide a valid message',			
			]);

			$data['image'] = "none";
			$data['imagePath'] = "none";
			$data['status'] = "draft";
						
			$mailPost->saveMailPost($data);			
	
			$response = Response::json(['success' => ['message' => 'Email has been saved.','data' => $data,] ], 200); 
				
			return  $response;	
				
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Email cannot be created, validation error!'] ], 422);
			
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
			$mailPost = MailPost::findOrFail($id); //Find MailPost of id = $id

			return View('emails.messages.show',compact('mailPost',200));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Email cannot be found.'] ], 404);
			
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
			$mailPost = MailPost::where('id', $id)->first(); //Find the first result where MailPost id = $id
			
			if ($mailPost->status == "sent")
			{
				$response = Response::json(['error' => ['message' => 'A Sent Email cannot be modified.'] ], 200);
				
				return 	$response;
			}
			
			return View('emails.messages.edit',compact('mailPost', 200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Email cannot be found.'] ], 404);
			
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
			$mailPost = new MailPost();
			$data = $this->validate($request, [
				'to'=>'required|email|max:60',
				'cc'=>'required|email|max:60',
				'subject'=>'required|max:60',
				'message'=>'required|max:250',
				'image'=>'required',
				'imagePath'=>'required',
				'status' => 'required',					
				'username'=>'required',				
			]);
		    $data['id'] = $id;
			
			$mailPost->updateMailPost($data);
			
			$response = Response::json(['success' => ['message' => 'Email has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Email cannot be updated, validation error!'] ], 422);
			
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
			$mailPost = MailPost::findOrFail($id); //Find MailPost of id = $id
			$mailPost->delete();
			
			$response = Response::json(['success' => ['message' => 'Email  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Email cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
	
    /**
     * Send a newly created email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
		try {
			$mailPost = new MailPost();
			$data = $this->validate($request, [
				'to'=>'required|email|max:60',
				'cc'=>'required|email|max:60',
				'subject'=>'required|max:60',
				'message'=>'required|max:450',
				'image'=>'required|max:90',
				'imagePath'=>'required|max:90',	
				'status'=>'required|max:60',					
			]);
		
				$data['status'] = "sent";
				$data['id'] = $request->input('id');
				
				$message = Message::first();
				$appdefaults = AppDefaults::first();
					
				/* send the email ro receiptient
				Mail::to($request->to)
					->cc($request->cc)
					->send(new CreateMessage($message,$appdefaults,$data));	*/
						
				$mailPost->updateMailPost($data);
				
				$response = Response::json(['success' => ['message' => 'Email Sent Sucessfully!'] ], 200);
				
				return 	$response;
				
			
		}catch(Exception $e){
			

			$response = Response::json(['error' => ['message' => 'Email cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
	}	



    /**
     * Preview a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function preview(Request $request)
    {
		try {
			
			$data = $this->validate($request, [
				'to'=>'required|email|max:60',
				'cc'=>'required|email|max:60',
				'subject'=>'required|max:60',
				'message'=>'required|max:450',
				'image'=>'required',
				'imagePath'=>'required',
				'status' => 'required',					
				'username'=>'required',				
			]);
			$data['id'] = $request->input('id');
			
			$appdefaults = AppDefaults::first();
			
			$messages = Message::where('email',$data['to'])->first();			

			if (!$messages ){
				return (new CreateMessage($messages = new Message, $appdefaults, $data));				
			}
			
			// preview the message...	
	
			return (new CreateMessage($messages, $appdefaults, $data));
						
		}catch(Exception $e){
			

			$response = Response::json(['error' => ['message' => 'Email cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
	}	
}
