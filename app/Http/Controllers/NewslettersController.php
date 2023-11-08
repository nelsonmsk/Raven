<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use App\Models\Newsletter;
use App\Models\MailSubscription;
use App\Notifications\NewsletterPublished;


class NewslettersController extends Controller
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
				$newsletters = Newsletter::Search($request->search_text)->simplePaginate(15);//Get all Newsletters
				return View('newsletters.pages.index',compact('newsletters'));
				
			}catch(Exception $e){
				return View('newsletters.pages.index');
			} 
		}else{
			try{
				$newsletters = Newsletter::latest()->simplePaginate(15);//Get all Newsletters
				return View('newsletters.pages.index',compact('newsletters'));
				
			}catch(Exception $e){
				return View('newsletters.pages.index');
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
		return	View('newsletters.pages.create');
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
			$newsletter = new Newsletter();
			$data = $this->validate($request, [
				'title'=>'required|max:60',
				'type'=>'required|max:60',
				'summary' =>'required|max:150',
				'created_by'=>'required|max:30',				
			]);
			
			$data['status'] = "draft";
			$data['published_date'] = null;
			
		   $file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('file')) {
			   $imagefile = $request->file('file');							 
			    $image = $imagefile->getClientOriginalName();//get original image name
				$path = $imagefile->store('image','public');//get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }
		
			$newsletter->saveNewsletter($data);			
	
			$response = Response::json(['success' => ['message' => 'Newsletter has been saved.','data' => $data,] ], 200); 
				
			return  $response;	
				
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Newsletter cannot be created, validation error!'] ], 422);
			
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
			$newsletter = Newsletter::findOrFail($id); //Find Newsletter of id = $id
			$status = '200';
			return View('newsletters.pages.show',compact('newsletter','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Newsletter cannot be found.'] ], 404);
			
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
			$newsletter = Newsletter::where('id', $id)->first(); //Find the first result where Newsletter id = $id
			
			if ($newsletter->status == "sent")
			{
				$response = Response::json(['error' => ['message' => 'A Sent Newsletter cannot be modified.'] ], 200);
				
				return 	$response;
			}
			$status = '200';
			return View('newsletters.pages.edit',compact('newsletter', 'status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Newsletter cannot be found.'] ], 404);
			
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
			$newsletter = new Newsletter();
			$data = $this->validate($request, [
				'title'=>'required|max:60',
				'type'=>'required|max:60',
				'summary'=>'required|max:150',
				'created_by'=>'required|max:30',
				'status' => 'required',
				'published_date'=>'date',
				'oldpath'=>'required',	
				'username'=>'required',				
			]);
			
			$file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('file')) {
			 	Storage::disk('public')->delete($data['oldpath']); //delete old image 	
				
			   $imagefile = $request->file('file');							 
			    $image = $imagefile->getClientOriginalName();	    //get original image name
				$path = $imagefile->store('image','public');       //get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }
				
		    $data['id'] = $id;
			
			$newsletter->updateNewsletter($data);
			
			$response = Response::json(['success' => ['message' => 'Newsletter has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Newsletter cannot be updated, validation error!'] ], 422);
			
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
			$newsletter = Newsletter::findOrFail($id); //Find Newsletter of id = $id
			$newsletter->delete();
			
			$response = Response::json(['success' => ['message' => 'Newsletter  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Newsletter cannot be found.'] ], 404);
			
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
			$newsLetter = new Newsletter();			
			$data = [
				'id'=> $request['id'],		
				'title'=> $request['title'],
				'type'=> $request['type'],
				'summary'=> $request['summary'],
				'created_by'=> $request['created_by'],
				'status' => $request['status'],
				'published_date'=> $request['published_date'],
				'image'=> $request['image'],				
				'imagePath'=> $request['imagePath'],	
				'username'=> $request['username'],				
			];
			
			//$newsletter = Newsletter::find($data['id']);
 			//$mailSubscription = MailSubscription::all();
			
			//Notification::send($mailSubscription, new NewsletterPublished($newsletter));
			
				$data['status'] =  "sent";
				$data['published_date'] = Carbon::now();
				
			$newsLetter->updateNewsletter($data);			
					
			$response = Response::json(['success' => ['message' => 'Newsletter Sent Sucessfully!'] ], 200);
				
			return 	$response;
				
			
		}catch(Exception $e){
			

			$response = Response::json(['error' => ['message' => 'Newsletter cannot be sent, validation error!'] ], 422);
			
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
			
			$id = $request->input('id');
			
			$newsletter = Newsletter::find($id);
			$subscribers = MailSubscription::all();			

			if (!$subscribers ){
				return (new NewsletterPublished($newsletter))
					->toMail($subscribers);				
			}
			
			// preview the message...	
				return (new NewsletterPublished($newsletter))
					->toMail($subscribers);					
		}catch(Exception $e){
			

			$response = Response::json(['error' => ['message' => 'Newsletter cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
	}	
}
