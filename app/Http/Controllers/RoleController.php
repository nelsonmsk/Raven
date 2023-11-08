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

 /*   public function __construct() {
        $this->middleware(['auth','admin']);//Admin middleware lets only users with a //specific permission permission to access these resources
    }
*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    try{
        $roles = Role::all();//Get all roles	
        
        return View('roles.auth.index',compact('roles',200));
 

   }catch(Exception $e){
	
		$response = Response::json(['error' => ['message' => 'Roles cannot be found.'] ], 404);

        return $response;
 
   }

 
  }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $permissions = Permission::all();//Get all permissions

        return View('roles.auth.create',compact('roles',200));   	
 
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

			$response = Response::json(['success' => ['message' => 'Role has been successfully added.','data' => $role,] ], 201); 	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Role cannot be created, validation error!'] ], 422);
			
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

    try{
        $role = Role::where('id', $id)->first();
		$response = Response::json($role, 200);	
        
        return $response;
 
    }catch(Exception $e){
       
		$response = Response::json(['error' => ['message' => 'Role cannot be found.'] ], 404);

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
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
		$response = Response::json($role, $permissions, 200);	
        
        return $response;
 

    }catch(Exception $e){
       
		$response = Response::json(['error' => ['message' => 'Role cannot be found.'] ], 404);

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

			$response = Response::json(['success' => ['message' => 'Role has been successfully added.','data' => $role,] ], 201); 	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Role cannot be created, validation error!'] ], 422);
			
			return 	$response;		
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
		$response = Response::json(['success' => ['message' => 'Role has been deleted.'] ], 200); 
				
		return  $response;
 

    }catch(Exception $e){
       
		$response = Response::json(['error' => ['message' => 'Role cannot be found.'] ], 404);

        return $response;
 
	}

   }

}