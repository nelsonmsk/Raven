<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\ProjectType;


class ProjectTypesController extends Controller
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
				$projectTypes = ProjectType::search($request->search_text)->SimplePaginate(15);
				return View('projectTypes.pages.index',compact('projectTypes'));	
				
			}catch(Exception $e){
				return View('projectTypes.pages.index');
		   } 			
        }else{		
		    try{
				$projectTypes = ProjectType::latest()->simplePaginate(15);//Get all ProjectTypes
				return View('projectTypes.pages.index',compact('projectTypes'));

			}catch(Exception $e){
				return View('projectTypes.pages.index');
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
		return	View('projectTypes.pages.create');
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
			$projectType = new ProjectType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
	 
			$projectType->saveProjectType($data);
			$response = Response::json(['success' => ['message' => 'ProjectType has been created successfully.','data' => $projectType,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'ProjectType cannot be created, validation error!'] ], 422);
			
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
			$projectType = ProjectType::findOrFail($id); //Find ProjectType of id = $id
			$status = '200';
			return View('projectTypes.pages.show',compact('projectType','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'ProjectType cannot be found.'] ], 404);
			
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
			$projectType = ProjectType::where('id', $id)->first(); //Find the first result where ProjectType id = $id
			$status = '200';
			return View('projectTypes.pages.edit',compact('projectType','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'ProjectType cannot be found.'] ], 404);
			
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
			$projectType = new ProjectType();
			$data = $this->validate($request, [
				'name'=>'required|max:15',
			]);
		    $data['id'] = $id;
			
			$projectType->updateProjectType($data);
			
			$response = Response::json(['success' => ['message' => 'ProjectType has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'ProjectType cannot be updated, validation error!'] ], 422);
			
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
			$projectType = ProjectType::findOrFail($id); //Find ProjectType of id = $id
			$projectType->delete();
			
			$response = Response::json(['success' => ['message' => 'ProjectType  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'ProjectType cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
	
}
