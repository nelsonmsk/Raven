<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Feature;

class FeaturesController extends Controller
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
				$features = Feature::search($request->search_text)->SimplePaginate(15);
				return View('features.pages.index',compact('features'));	
				
			}catch(Exception $e){
				return View('features.pages.index');
		   } 			
        }else{		
		    try{
				$features = Feature::latest()->simplePaginate(15);//Get all Features
				return View('features.pages.index',compact('features'));

			}catch(Exception $e){
				return View('features.pages.index');
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
		return	View('features.pages.create');
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
			$feature = new Feature();
			$data = $this->validate($request, [
				'title'=>'required|max:30',
				'body'=>'required|max:150',
				'icon'=>'required|max:30',				
				'pageId'=>'required|max:2',
			]);
	 
			$feature->saveFeature($data);
			$response = Response::json(['success' => ['message' => 'Feature has been created successfully.','data' => $feature,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Feature cannot be created, validation error!'] ], 422);
			
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
			$feature = Feature::findOrFail($id); //Find Feature of id = $id
			$status = '200';
			return View('features.pages.show',compact('feature','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Feature cannot be found.'] ], 404);
			
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
			$feature = Feature::where('id', $id)->first(); //Find the first result where Feature id = $id
			$status = '200';
			return View('features.pages.edit',compact('feature','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Feature cannot be found.'] ], 404);
			
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
			$feature = new Feature();
			$data = $this->validate($request, [
				'title'=>'required|max:30',
				'body'=>'required|max:150',
				'icon'=>'required|max:30',				
				'pageId'=>'required|max:2',
			]);
		    $data['id'] = $id;
			
			$feature->updateFeature($data);
			
			$response = Response::json(['success' => ['message' => 'Feature has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Feature cannot be updated, validation error!'] ], 422);
			
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
			$feature = Feature::findOrFail($id); //Find Feature of id = $id
			$feature->delete();
			
			$response = Response::json(['success' => ['message' => 'Feature has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Feature cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
	
	
}
