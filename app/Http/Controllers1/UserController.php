<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'admin']); //Admin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
      try{
			$users = User::all();
		
			$response = Response::json($users, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Users cannot be found.'] ], 404);
			
			return 	$response;
	   }			
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
       // $roles = Role::get();
       /// return view('users.create', ['roles'=>$roles]);
		return	$response = Response::json(['error' => ['message' => 'User cannot be found.'] ], 404);		
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
	
		try{
			$user = new User();

			//Validate name, email and password fields
			   $data = $this->validate($request, [
					'name'=>'required|max:120',
					'email'=>'required|email|unique:users',
					'password'=>'required|min:6|confirmed'
				]);

				$user->saveUser($data); //Retrieving only the email and password data

				$roles = $request['roles']; //Retrieving the roles field
				
			//Checking if a role was selected
				if (isset($roles)) {

					foreach ($roles as $role) {
					$role_r = Role::where('id', '=', $role)->firstOrFail();            
					$user->assignRole($role_r); //Assigning role to user
					}
				}        
			$response = Response::json(['success' => ['message' => 'User has been successfully added.','data' => $user,] ], 201); 	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'User cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}					 
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
		try{
			$user = User::findOrFail($id); //Get user with specified id
			
			$roles = Role::get(); //Get all roles

			$response = Response::json([$user,$roles,], 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'User cannot be found.'] ], 404);
			
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
    public function update(Request $request, $id) {
		try{
			$user = User::findOrFail($id); //Get role specified by id

		//Validate name, email and password fields    
			$data = $this->validate($request, [
				'name'=>'required|max:120',
				'email'=>'required|email|unique:users,email,'.$id,
				'password'=>'required|min:6|confirmed'
			]);
			$data['id'] = $id;

			$roles = $request['roles']; //Retreive all roles
			$user-> updateUser($data);

			if (isset($roles)) {        
				$user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
			}        
			else {
				$user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
			}
			
			$response = Response::json(['success' => ['message' => 'User has been updated.','data' => $user,] ], 200); 
				
			return  $response;;
				 
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'User cannot be updated, validation error!'] ], 422);
			
			return 	$response;		
		}				 
			 
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
		try{	
			$user = User::findOrFail($id); 
			$user->delete();

			$response = Response::json(['success' => ['message' => 'User has been deleted.'] ], 200); 
				
			return  $response;
				 
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'User cannot be found.'] ], 404);
			
			return 	$response;		
		}				 
    }
}