<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Client;

class ProjectsController extends Controller
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
				$projects = Project::Search($request->search_text)->simplePaginate(15);//Get all Projects
				$status = '200';
				return View('projects.pages.index',compact('projects','status'));
				
			}catch(Exception $e){
				return View('projects.pages.edit');
			}
		}else{
			try{
				$projects = Project::latest()->simplePaginate(15);//Get all Projects
				$status = '200';
				return View('projects.pages.index',compact('projects','status'));
				
			}catch(Exception $e){
				return View('projects.pages.index');
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
		$projectTypes = ProjectType::all();		
		return	View('projects.pages.create',compact('projectTypes'));
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
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'type'=>'required|max:60',				
				'sdate'=>'required|date|before:edate',
				'edate'=>'required|date|after:sdate',
				'status'=>'required|max:30',
				'description'=>'max:120',
				'client_id'=>'required|max:12',	
			]);
		
			/*$project = new Project($data);	
		    $id = $request['client_id'];
		    $client = Client::findOrFail($id);			
			$client->projects()->save($project);*/
			
			$project = new Project();
			$project->saveProject($data);
			
			$response = Response::json(['success' => ['message' => 'Project has been created successfully.','data' => $project,] ], 201); 			
			return  $response;			
		}catch(Exception $e){		
			$response = Response::json(['error' => ['message' => 'Project cannot be created, validation error!'] ], 422);		
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
			$project = Project::findOrFail($id); //Find Project of id = $id
			$status = '200';
			return View('projects.pages.show',compact('project','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Project cannot be found.'] ], 404);
			
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
			$project = Project::where('id', $id)->first(); //Find the first result where Project id = $id
		    $projectTypes = ProjectType::all();			
			$status = '200';
			return View('projects.pages.edit',compact('project,projectTypes','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Project cannot be found.'] ], 404);
			
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
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'type'=>'required|max:60',				
				'sdate'=>'required|date|before:edate',
				'edate'=>'required|date|after:sdate',
				'status'=>'required|max:30',
				'description'=>'max:120',
				'client_id'=>'required|max:12',	
			]);		
			
		    $data['id'] = $id;
					   
		    /*$id = $request['client_id'];
		    $client = Client::findOrFail($id);			
			$project = $client->projects()->find($id);
			$project->fill($data)->save();*/
			
			$project = new Project();
			$project->updateProject($data);
			
			$response = Response::json(['success' => ['message' => 'Project has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Project cannot be updated, validation error!'] ], 422);
			
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
			$project = Project::findOrFail($id); //Find Project of id = $id			
			$project->delete();		
			$response = Response::json(['success' => ['message' => 'Project has been deleted.'] ], 200); 			
			return  $response;	
			
		}catch(Exception $e){	
			$response = Response::json(['error' => ['message' => 'Project cannot be found.'] ], 404);	
			return 	$response;		
		}			
    }
}
