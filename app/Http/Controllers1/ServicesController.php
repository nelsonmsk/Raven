<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Service;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$services = Service::simplePaginate(15);//Get all Services

			$response = Response::json($services, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Services cannot be found.'] ], 404);
			
			return 	$response;
	   }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return	$response = Response::json(['error' => ['message' => 'Service cannot be found.'] ], 404);
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
			$service = new Service();
			$data = $this->validate($request, [
				'name'=>'required|max:30',
				'description'=>'required|max:30',
				'pageId'=>'required',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		   
			$service->saveService($data);
			
			$response = Response::json(['success' => ['message' => 'Service has been created successfully.','data' => $service,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Service cannot be created, validation error!'] ], 422);
			
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
			$service = Service::findOrFail($id); //Find Service of id = $id

			$response = Response::json($service, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Service cannot be found.'] ], 404);
			
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
			$service = Service::where('id', $id)->first(); //Find the first result where Service id = $id
		
			$response = Response::json($service, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Service cannot be found.'] ], 404);
			
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
			$service = new Service();
			$data = $this->validate($request, [
				'name'=>'required|max:30',
				'description'=>'required|max:30',
				'pageId'=>'required',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$service->updateService($data);
			
			$response = Response::json(['success' => ['message' => 'Service has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Service cannot be updated, validation error!'] ], 422);
			
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
			$service = Service::findOrFail($id); //Find Service of id = $id
			$service->delete();
			
			$response = Response::json(['success' => ['message' => 'Service  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Service cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
