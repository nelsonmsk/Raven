<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Dessert;

class DessertsMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$desserts = Dessert::simplePaginate(15);//Get all Desserts

			$response = Response::json($desserts, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Desserts cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'Dessert cannot be found.'] ], 404);
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
			$dessert = new Dessert();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		   
			$dessert->saveDessert($data);
			
			$response = Response::json(['success' => ['message' => 'Dessert has been created successfully.','data' => $dessert,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Dessert cannot be created, validation error!'] ], 422);
			
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
			$dessert = Dessert::findOrFail($id); //Find Dessert of id = $id

			$response = Response::json($dessert, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dessert cannot be found.'] ], 404);
			
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
			$dessert = Dessert::where('id', $id)->first(); //Find the first result where Dessert id = $id
		
			$response = Response::json($dessert, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Dessert cannot be found.'] ], 404);
			
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
			$dessert = new Dessert();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'image'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$dessert->updateDessert($data);
			
			$response = Response::json(['success' => ['message' => 'Dessert has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Dessert cannot be updated, validation error!'] ], 422);
			
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
			$dessert = Dessert::findOrFail($id); //Find Dessert of id = $id
			$dessert->delete();
			
			$response = Response::json(['success' => ['message' => 'Dessert has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Dessert cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
