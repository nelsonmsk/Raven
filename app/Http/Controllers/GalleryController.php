<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Gallery;
use App\AppDefaults;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$gallery = Gallery::simplePaginate(15);//Get all Gallery

			return View('gallery.pages.index',compact('gallery'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Gallery cannot be found.'] ], 404);
			
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
		return View('gallery.pages.create');
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
			$gallery = new Gallery();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'description'=>'required|max:90',
				'pageId'=>'required|max:2',
			]);
			$filer = $request->validate(['image'=>'required|mimes:jpeg,bmp,png',]);
			
			
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
		 
		 $gallery->saveGallery($data);
			
			$response = Response::json(['success' => ['message' => 'Gallery has been created successfully.','data' => $path,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Gallery cannot be created, validation error!'] ], 422);
			
			return 	$response;		
		}	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
		try{ 
			
			$appDefaults = AppDefaults::first();
			$gallery = Gallery::simplePaginate(12); //Get whole Gallery 
			
			$rtemplate = ['appDefaults' => $appDefaults,'gallery' => $gallery];

			return View ('gallery.pages.show',compact('rtemplate',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Gallery cannot be found.'] ], 404);
			
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
			$gallery = Gallery::where('id', $id)->first(); //Find the first result where Gallery id = $id
		
			return View('gallery.pages.edit',compact('gallery',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Gallery cannot be found.'] ], 404);
			
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
			$gallery = new Gallery();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'description'=>'required|max:90',
				'pageId'=>'required|max:2',
				'username'=>'required',
				'oldpath'=>'required',				
			]);
			$filer = $request->validate(['image'=>'required|mimes:jpeg,bmp,png',]);
			
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
			
			$gallery->updateGallery($data);
			
			$response = Response::json(['success' => ['message' => 'Gallery has been updated.','data' => $gallery,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Gallery cannot be updated, validation error!'] ], 422);
			
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
			$gallery = Gallery::findOrFail($id); //Find Gallery of id = $id
			Storage::disk('public')->delete($gallery->imagePath);
			$gallery->delete();
			
			$response = Response::json(['success' => ['message' => 'Gallery  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Gallery cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
