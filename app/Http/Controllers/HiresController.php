<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Hire;


class HiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$hires = Hire::simplePaginate(15);//Get all Hires

			return View('hires.pages.index',compact('hires',));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Hires cannot be found.'] ], 404);
			
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
			return View('hires.pages.create');
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
			$hire = new Hire();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|alpha_num|max:20',
				'status'=>'required',

			]);
		   
			$hire->saveHire($data);
			
			$response = Response::json(['success' => ['message' => 'Hire has been created successfully.','data' => $hire,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Hire cannot be created, validation error!'] ], 422);
			
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
			$hire = Hire::findOrFail($id); //Find Hire of id = $id

			$response = Response::json($hire, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);
			
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
			$hire = Hire::where('id', $id)->first(); //Find the first result where Hire id = $id
		
			return View('hires.pages.edit',compact('hire',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);
			
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
			$hire = new Hire();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|alpha_num|max:20',
				'status'=>'required',
				'username'=>'required',
			]);
		    $data['id'] = $id;
			
			$hire->updateHire($data);
			
			$response = Response::json(['success' => ['message' => 'Hire has been updated.','data' => $hire,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Hire cannot be updated, validation error!'] ], 422);
			
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
			$hire = Hire::findOrFail($id); //Find Hire of id = $id
			$hire->delete();
			
			$response = Response::json(['success' => ['message' => 'Hire has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Hire cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
