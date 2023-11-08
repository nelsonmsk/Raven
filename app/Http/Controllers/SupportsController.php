<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Support;

class SupportsController extends Controller
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
				$supports = Support::search($request->search_text)->SimplePaginate(15);
				return View('supports.pages.index',compact('supports'));	
				
			}catch(Exception $e){
				return View('supports.pages.index');
		   } 			
        }else{		
		    try{
				$supports = Support::latest()->simplePaginate(15);//Get all Supports
				return View('supports.pages.index',compact('supports'));

			}catch(Exception $e){
				return View('supports.pages.index');
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
		return	View('supports.pages.create');
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
			$support = new Support();
			$data = $this->validate($request, [
				'type'=>'required|max:30',
				'title'=>'required|max:30',
				'question'=>'max:150',				
				'answer'=>'max:250',
				'video'=>'max:60',				
			]);
	 
			$support->saveSupport($data);
			$response = Response::json(['success' => ['message' => 'Support has been created successfully.','data' => $support,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Support cannot be created, validation error!'] ], 422);
			
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
			$support = Support::findOrFail($id); //Find Support of id = $id
			$status = '200';
			return View('supports.pages.show',compact('support','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Support cannot be found.'] ], 404);
			
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
			$support = Support::where('id', $id)->first(); //Find the first result where Support id = $id
			$status = '200';
			return View('supports.pages.edit',compact('support','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Support cannot be found.'] ], 404);
			
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
			$support = new Support();
			$data = $this->validate($request, [
				'type'=>'required|max:30',
				'title'=>'required|max:30',
				'question'=>'max:150',				
				'answer'=>'max:250',
				'video'=>'max:60',	
			]);
		    $data['id'] = $id;
			
			$support->updateSupport($data);
			
			$response = Response::json(['success' => ['message' => 'Support has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Support cannot be updated, validation error!'] ], 422);
			
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
			$support = Support::findOrFail($id); //Find Support of id = $id
			$support->delete();
			
			$response = Response::json(['success' => ['message' => 'Support  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Support cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
	
    /**
     * Search for the specified resource using the given search-text.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */	
    public function search($text)
    {
      try{
			$supports = Support::latest()->simplePaginate(15);//Get all Supports

			return View('supports.pages.search',compact('supports'));

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Supports Results cannot be found.'] ], 404);
			
			return 	$response;
	   }  
    }	
}
