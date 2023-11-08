<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Client;


class ClientsController extends Controller
{
 
   /**
     * Show table list of all the clients.
     *
 
    * @return \Illuminate\View\View
     */
  
  public function index(Request $request)
    {
		if($request->has('search_text')){	
		    try{		
				$clients = Client::Search($request->search_text)->SimplePaginate(15) ; //Get all clients
				$status = '200';
				return view('clients.pages.index',compact('clients','status'));
				
			}catch(Exception $e){
				return view('clients.pages.index');
		    }
		}else{
		    try{		
				$clients = Client::latest()->simplePaginate(15) ; //Get all clients
				$status = '200';
				return view('clients.pages.index',compact('clients','status'));
				
			}catch(Exception $e){
				return view('clients.pages.index');
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
			return View('clients.pages.create');
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
			$client = new Client();
			$data = $this->validate($request, [
				'name'=>'required|max:60',			
				'email'=>'required|email|max:60',
				'phone'=>'required|max:30',		
				'address'=>'required|max:120',	
				'city'=>'required|max:60',
				'country'=>'required|max:60',				
			]);
		   
			$client->saveClient($data);
			
			$response = Response::json(['success' => ['message' => 'Client has been created successfully.'] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Client cannot be created, validation error!'] ], 422);
			
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
			$client = Client::findOrFail($id); //Find Service of id = $id
			$status = '200';
			return View('clients.pages.show',compact('client','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Client cannot be found.'] ], 404);
			
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
			$client = Client::where('id', $id)->first(); //Find the first result where Client id = $id
		
			$status = '200';
			return View('clients.pages.edit',compact('client','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Client cannot be found.'] ], 404);
			
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
			$client = new Client();
			$data = $this->validate($request, [
				'name'=>'required|max:60',			
				'email'=>'required|email|max:60',
				'phone'=>'required|max:30',		
				'address'=>'required|max:120',
				'city'=>'required|max:60',
				'country'=>'required|max:60',				
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			
			$client->updateClient($data);
			
			$response = Response::json(['success' => ['message' => 'Client has been updated.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Client cannot be updated, validation error!'] ], 422);
			
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
			$client = Client::findOrFail($id); //Find Client of id = $id			
			$client->delete();
			
			$response = Response::json(['success' => ['message' => 'Client has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Client cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}
