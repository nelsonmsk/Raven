<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Task;
use App\Models\User;

class TasksController extends Controller
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
				$tasks = Task::search($request->search_text)->SimplePaginate(15);
				return View('tasks.pages.index',compact('tasks'));	
				
			}catch(Exception $e){
				return View('tasks.pages.index');
		   } 			
        }else{		
		    try{
				$tasks = Task::latest()->simplePaginate(15);//Get all Tasks
				return View('tasks.pages.index',compact('tasks'));

			}catch(Exception $e){
				return View('tasks.pages.index');
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
		return	View('tasks.pages.create');
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
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'project_id' =>'required',
				'user_id' => 'required',
			]);
	 
			$user = User::find($request->user_id);
			//$task = new Task($data);
			//$task->save();
			$user->projects()->task()->attach($request->project_id);
			$response = Response::json(['success' => ['message' => 'Task has been created successfully.','data' => $task,] ], 201); 

			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Task cannot be created, validation error!'] ], 422);
			
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
			$task = Task::findOrFail($id); //Find Task of id = $id
			$status = '200';
			return View('tasks.pages.show',compact('task','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Task cannot be found.'] ], 404);
			
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
			$task = Task::where('id', $id)->first(); //Find the first result where Task id = $id
			$status = '200';
			return View('tasks.pages.edit',compact('task','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Task cannot be found.'] ], 404);
			
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
			$task = new Task();
			$data = $this->validate($request, [
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'project_id'=>'required',
				'user_id'=>'required',	
			]);
		    $data['id'] = $id;
			
			$task->updateTask($data);
			
			$response = Response::json(['success' => ['message' => 'Task has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Task cannot be updated, validation error!'] ], 422);
			
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
			$task = Task::findOrFail($id); //Find Task of id = $id
			$task->delete();
			
			$response = Response::json(['success' => ['message' => 'Task  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Task cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
	
}
