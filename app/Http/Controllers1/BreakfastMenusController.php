<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Breakfast;

class BreakfastMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$breakfast = Breakfast::simplePaginate(15);//Get all Breakfast

			$response = Response::json($breakfast, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Breakfast cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'Breakfast cannot be found.'] ], 404);
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
			$breakfast = new Breakfast();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		   
			$breakfast->saveBreakfast($data);
			
			$response = Response::json(['success' => ['message' => 'Breakfast has been created successfully.','data' => $breakfast,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Breakfast cannot be created, validation error!'] ], 422);
			
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
			$breakfast = Breakfast::findOrFail($id); //Find Breakfast of id = $id

			$response = Response::json($breakfast, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Breakfast cannot be found.'] ], 404);
			
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
			$breakfast = Breakfast::where('id', $id)->first(); //Find the first result where Breakfast id = $id
		
			$response = Response::json($breakfast, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Breakfast cannot be found.'] ], 404);
			
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
			$breakfast = new Breakfast();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$breakfast->updateBreakfast($data);
			
			$response = Response::json(['success' => ['message' => 'Breakfast has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Breakfast cannot be updated, validation error!'] ], 422);
			
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
			$breakfast = Breakfast::findOrFail($id); //Find Breakfast of id = $id
			$breakfast->delete();
			
			$response = Response::json(['success' => ['message' => 'Breakfast has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Breakfast cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
