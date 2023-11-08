<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class PermissionController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'admin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }


    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {

    try{
        $permissions = Permission::all(); //Get all permissions
	$response = Response::json($permissions, 200);	
        
        return $response;
 

   }catch(Exception $e){
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;
 
   }

 
  }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
 
    try{
        $roles = Role::get(); //Get all roles
	$message =  ['url'=>'/permissions/create'];
	$response = Response::json($message, $roles);

        return $response;   

    }catch(Exception $e){
       
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;
 
 
	}	
 
   }



    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
 
    try{
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

	$message = ['success' =>'New Permission has been successfully created!','url' => '/permissions'];
	$response = Response::json($message, 201);

        return $response;
  
     }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to created new Permission!']];
	$response = Response::json($message, 403);

        return $response;

     }

 
   }



    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {

    try{
        $permission = Permission::where('id', $id)->first();
	$response = Response::json($permission, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;

     }

 
   }






    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {

    try{
        $permission = Permission::findOrFail($id);
	$response = Response::json($permission, $id, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;

     }

 
   



    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();

    try{
        $permission = Permission::findOrFail($id);
        $permission->fill($input)->save();

	$message = ['success' =>'Permission has been successfully updated!', 'url' => '/permissions'];
	$response = Response::json($message, 200);	
        
        return $response;
 


    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to update Permission!']];
	$response = Response::json($message, 403);

        return $response;

    }

   }





    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {

    try{
        $permission = Permission::findOrFail($id);

    //Make it impossible to delete this specific permission    
    if ($permission->name == "Administer roles & permissions") {
	$message = ['error' => ['message' =>'Cannot delete Permission!']];
	$response = Response::json($message, 403);

        return $response;

        }

        $permission->delete();
        $message = ['success' =>'Permission has been successfully deleted!', 'url' => '/permissions'];
	$response = Response::json($message, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No Permission found!']];
	$response = Response::json($message, 404);

        return $response;

    }

   }

}