<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Coffee;

class CoffeeMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$coffees = Coffee::simplePaginate(15);//Get all Coffees

			$response = Response::json($coffees, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffees cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
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
			$coffee = new Coffee();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		   
			$coffee->saveCoffee($data);
			
			$response = Response::json(['success' => ['message' => 'Coffee has been created successfully.','data' => $coffee,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be created, validation error!'] ], 422);
			
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
			$coffee = Coffee::findOrFail($id); //Find Coffee of id = $id

			$response = Response::json($coffee, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
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
			$coffee = Coffee::where('id', $id)->first(); //Find the first result where Coffee id = $id
		
			$response = Response::json($coffee, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
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
			$coffee = new Coffee();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$coffee->updateCoffee($data);
			
			$response = Response::json(['success' => ['message' => 'Coffee has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be updated, validation error!'] ], 422);
			
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
			$coffee = Coffee::findOrFail($id); //Find Coffee of id = $id
			$coffee->delete();
			
			$response = Response::json(['success' => ['message' => 'Coffee has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
