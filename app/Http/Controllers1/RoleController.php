<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class RoleController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'admin']);//Admin middleware lets only users with a //specific permission permission to access these resources
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    try{
        $roles = Role::all();//Get all roles
	$response = Response::json($roles, 200);	
        
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
        $permissions = Permission::all();//Get all permissions
	$message =  ['url'=>'/roles/create'];
	$response = Response::json($message, $permissions);

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
    //Validate name and permissions field

        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'permissions' =>'required',
            ]
        );
        $name = $request['name'];

     try{
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();

    //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
         //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first(); 
            $role->givePermissionTo($p);
        }

	$message = ['success' =>'New Role has been successfully created!','url' => '/roles'];
	$response = Response::json($message, 201);

        return $response;
  
     }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to created new Role!']];
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
        $role = Role::where('id', $id)->first();
	$response = Response::json($role, 200);	
        
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
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
	$response = Response::json($role, $permissions, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;

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

    //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:10|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];

    try{
        $role = Role::findOrFail($id);//Get role with the given id
        $role->fill($input)->save();

        $p_all = Permission::all();//Get all permissions

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $role->givePermissionTo($p);  //Assign permission to role
        }

	$message = ['success' =>'Role has been successfully updated!', 'url' => '/roles'];
	$response = Response::json($message, 200);	
        
        return $response;
 


    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to update Role!']];
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
    public function destroy($id){

    try{
        $role = Role::findOrFail($id);
        $role->delete();
        $message = ['success' =>'Role has been successfully deleted!', 'url' => '/roles'];
	$response = Response::json($message, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No Role found!']];
	$response = Response::json($message, 404);

        return $response;

    }

   }

}