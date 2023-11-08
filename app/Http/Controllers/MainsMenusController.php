<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Mains;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class MainsMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$mains = Mains::simplePaginate(15);//Get all Mains

			return View('menus.pages.mains.index',compact('mains'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Mains cannot be found.'] ], 404);
			
			return 	$response;
	   }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return View('menus.pages.mains.create');
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
			$mains = new Mains();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
			]);
			
			$file = $request->validate(['image'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('image')) {
			   $imagefile = $request->file('image');							 
			    $image = $imagefile->getClientOriginalName();//get original image name
				$path = $imagefile->store('image','public');//get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }	

	
			$mains->saveMains($data);
			
			$response = Response::json(['success' => ['message' => 'Mains has been created successfully.','data' => $mains,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Mains cannot be created, validation error!'] ], 422);
			
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
			$mains = Mains::findOrFail($id); //Find Mains of id = $id

			$response = Response::json($mains, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Mains cannot be found.'] ], 404);
			
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
			$mains = Mains::where('id', $id)->first(); //Find the first result where Mains id = $id
		
			return View('menus.pages.mains.edit',compact('mains',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Mains cannot be found.'] ], 404);
			
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
			$mains = new Mains();
			$data = $this->validate($request, [
				'type'=>'required|max:30',			
				'name'=>'required|max:30',
				'description'=>'required|max:50',
				'price'=>'required|max:15',
				'username'=>'required',
				'oldpath'=>'required',			
			]);
			
			$file = $request->validate(['image'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('image')) {
			 	Storage::disk('public')->delete($data['oldpath']); //delete old image 	
				
			   $imagefile = $request->file('image');							 
			    $image = $imagefile->getClientOriginalName();	    //get original image name
				$path = $imagefile->store('image','public');       //get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }			
			
			
		    $data['id'] = $id;
			
			$mains->updateMains($data);
			
			$response = Response::json(['success' => ['message' => 'Mains has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Mains cannot be updated, validation error!'] ], 422);
			
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
			$mains = Mains::findOrFail($id); //Find Mains of id = $id
			Storage::disk('public')->delete($mains->imagePath);			
			$mains->delete();
			
			$response = Response::json(['success' => ['message' => 'Mains has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Mains cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
