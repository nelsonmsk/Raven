<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Drink;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class DrinksMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$drinks = Drink::simplePaginate(15);//Get all Drink

			return View('menus.pages.drinks.index',compact('drinks'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Drink cannot be found.'] ], 404);
			
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
			return View('menus.pages.drinks.create');
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
			$drink = new Drink();
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
		   
			$drink->saveDrink($data);
			
			$response = Response::json(['success' => ['message' => 'Drink has been created successfully.','data' => $drinks,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Drink cannot be created, validation error!'] ], 422);
			
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
			$drink = Drink::findOrFail($id); //Find Drink of id = $id

			$response = Response::json($drink, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Drink cannot be found.'] ], 404);
			
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
			$drink = Drink::where('id', $id)->first(); //Find the first result where Drink id = $id
		
			return View('menus.pages.drinks.edit',compact('drink',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Drink cannot be found.'] ], 404);
			
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
			$drink = new Drink();
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
			
			$drink->updateDrink($data);
			
			$response = Response::json(['success' => ['message' => 'Drink has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Drink cannot be updated, validation error!'] ], 422);
			
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
			$drink = Drink::findOrFail($id); //Find Drink of id = $id
			Storage::disk('public')->delete($drink->imagePath);			
			$drink->delete();
			
			$response = Response::json(['success' => ['message' => 'Drink has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Drink cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
