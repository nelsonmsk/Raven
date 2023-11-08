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

  /*  public function __construct() {
        $this->middleware(['auth', 'admin']); //isAdmin middleware lets only permissions with a //specific permission permission to access these resources
    }
*/

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {

    try{
        $permissions = Permission::all(); //Get all permissions
		     
        return View('permissions.auth.index',compact('permissions', 200));
 

   }catch(Exception $e){
	
		$response = Response::json(['error' => ['message' => 'Permissions cannot be found.'] ], 404);

        return $response;
 
   }

 
  }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
 
        $roles = Role::get(); //Get all roles

        return View('permissions.auth.create',compact('roles'));   	
 
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

			$response = Response::json(['success' => ['message' => 'Permission has been successfully added.','data' => $permission,] ], 201); 	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Permission cannot be created, validation error!'] ], 422);
			
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
        $permission = Permission::where('id', $id)->first();
		$response = Response::json($permission, 200);	
        
        return $response;
 

    }catch(Exception $e){
       
		$response = Response::json(['error' => ['message' => 'Permissions cannot be found.'] ], 404);

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
       
		$response = Response::json(['error' => ['message' => 'Permissions cannot be found.'] ], 404);

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

        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();

    try{
        $permission = Permission::findOrFail($id);
        $permission->fill($input)->save();

			$response = Response::json(['success' => ['message' => 'Permission has been successfully Updated.','data' => $permission,] ], 200); 	
        
        return $response;
 


		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Permission cannot be created, validation error!'] ], 422);
			
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

    try{
        $permission = Permission::findOrFail($id);

    //Make it impossible to delete this specific permission    
    if ($permission->name == "Administer roles & permissions") {
	$message = ['error' => ['message' =>'Cannot delete Permission!']];
	$response = Response::json($message, 403);

        return $response;

        }

        $permission->delete();

		$response = Response::json(['success' => ['message' => 'Permission has been deleted.'] ], 200); 
				
		return  $response;
 

    }catch(Exception $e){
       
		$response = Response::json(['error' => ['message' => 'Permissions cannot be found.'] ], 404);

        return $response;
 
	}	

   }

}