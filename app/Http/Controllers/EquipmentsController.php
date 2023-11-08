<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Equipment;

class EquipmentsController extends Controller
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
				$equipments = Equipment::Search($request->search_text)->simplePaginate(15);//Get all Equipments
				return View('equipment.pages.index',compact('equipments'));
				
			}catch(Exception $e){
				return View('reports.equipment.index');
		   } 
		}else{	
		    try{
				$equipments = Equipment::latest()->simplePaginate(15);//Get all Equipments
				return View('equipment.pages.index',compact('equipments'));
				
			}catch(Exception $e){
				return View('reports.equipment.index');
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
		return View('equipment.pages.create');
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
			$equipment = new Equipment();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'description'=>'required|max:90',
				'pageId'=>'required|max:2',
			]);
			$file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			
			
		   if ($request->hasFile('file')) {
			   $imagefile = $request->file('file');							 
			    $image = $imagefile->getClientOriginalName();//get original image name
				$path = $imagefile->store('image','public');//get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }
		 
		 $equipment->saveEquipment($data);
			
			$response = Response::json(['success' => ['message' => 'Equipment has been created successfully.','data' => $path,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Equipment cannot be created, validation error!'] ], 422);
			
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
			$equipment = Equipment::findOrFail($id); //Find Equipment of id = $id
			
			$response = Response::json($equipment, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Equipment cannot be found.'] ], 404);
			
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
			$equipment = Equipment::where('id', $id)->first(); //Find the first result where Equipment id = $id
			$status = '200';
			return View('equipment.pages.edit',compact('equipment','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Equipment cannot be found.'] ], 404);
			
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
			$equipment = new Equipment();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'description'=>'required|max:90',
				'pageId'=>'required|max:2',
				'username'=>'required',
				'oldpath'=>'required',				
			]);
			$file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('file')) {
			 	Storage::disk('public')->delete($data['oldpath']); //delete old image 	
				
			   $imagefile = $request->file('file');							 
			    $image = $imagefile->getClientOriginalName();	    //get original image name
				$path = $imagefile->store('image','public');       //get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }
			
		    $data['id'] = $id;
			
			$equipment->updateEquipment($data);
			
			$response = Response::json(['success' => ['message' => 'Equipment has been updated.','data' => $equipment,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Equipment cannot be updated, validation error!'] ], 422);
			
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
			$equipment = Equipment::findOrFail($id); //Find Equipment of id = $id
			Storage::disk('public')->delete($equipment->imagePath);
			$equipment->delete();
			
			$response = Response::json(['success' => ['message' => 'Equipment  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Equipment cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
