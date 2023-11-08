<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Coffee;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CoffeeMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$coffees = Coffee::simplePaginate(15);//Get all Coffees

			return View('menus.pages.coffees.index',compact('coffees'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffees cannot be found.'] ], 404);
			
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
			return View('menus.pages.coffees.create');
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
			$coffee = new Coffee();
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
		   
			$coffee->saveCoffee($data);
			
			$response = Response::json(['success' => ['message' => 'Coffee has been created successfully.','data' => $coffee,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be created, validation error!'] ], 422);
			
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
			$coffee = Coffee::findOrFail($id); //Find Coffee of id = $id

			$response = Response::json($coffee, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
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
			$coffee = Coffee::where('id', $id)->first(); //Find the first result where Coffee id = $id
		
			return View('menus.pages.coffees.edit',compact('coffee',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
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
			$coffee = new Coffee();
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
			
			$coffee->updateCoffee($data);
			
			$response = Response::json(['success' => ['message' => 'Coffee has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be updated, validation error!'] ], 422);
			
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
			$coffee = Coffee::findOrFail($id); //Find Coffee of id = $id
			Storage::disk('public')->delete($coffee->imagePath);			
			$coffee->delete();
			
			$response = Response::json(['success' => ['message' => 'Coffee has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Coffee cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
