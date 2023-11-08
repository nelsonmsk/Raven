<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Plan;


class PlansController extends Controller
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
				$plans = Plan::Search($request->search_text)->simplePaginate(15);//Get all Plans
				return View('plans.pages.index',compact('plans'));
				
			}catch(Exception $e){
				return View('plans.pages.index');
			}
		}else{
			try{
				$plans = Plan::latest()->simplePaginate(15);//Get all Plans
				return View('plans.pages.index',compact('plans'));
				
			}catch(Exception $e){
				return View('plans.pages.index');
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
		return	View('plans.pages.create');
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
			$plan = new Plan();
			$data = $this->validate($request, [
				'name'=>'required|max:30',				
				'description'=>'required|max:30',
				'price'=>'required|numeric|max:6',
				'duration'=>'required|max:15',				
				'pageId'=>'required',
			]);
		   
			$plan->savePlan($data);
			
			$response = Response::json(['success' => ['message' => 'Plan has been created successfully.','data' => $plan,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Plan cannot be created, validation error!'] ], 422);
			
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
			$plan = Plan::findOrFail($id); //Find Plan of id = $id
			$status = '200';
			return View('plans.pages.show',compact('plan','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Plan cannot be found.'] ], 404);
			
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
			$plan = Plan::where('id', $id)->first(); //Find the first result where Plan id = $id
			$status = '200';
			return View('plans.pages.edit',compact('plan','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Plan cannot be found.'] ], 404);
			
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
			$plan = new Plan();
			$data = $this->validate($request, [
				'name'=>'required|max:30',
				'description'=>'required|max:30',
				'price'=>'required|numeric|max:6',
				'duration'=>'required|max:15',				
				'pageId'=>'required',
			]);
		    $data['id'] = $id;
			
			$plan->updatePlan($data);
			
			$response = Response::json(['success' => ['message' => 'Plan has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Plan cannot be updated, validation error!'] ], 422);
			
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
			$plan = Plan::findOrFail($id); //Find Plan of id = $id
			$plan->delete();
			
			$response = Response::json(['success' => ['message' => 'Plan  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Plan cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
