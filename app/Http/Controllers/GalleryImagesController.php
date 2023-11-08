<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\GalleryImage;
use App\Models\Service;

class GalleryImagesController extends Controller
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
				$galleryImages = GalleryImage::Search($request->search_text)->simplePaginate(15);//Get all GalleryImage
				return View('galleryImages.pages.index',compact('galleryImages'));
				
			}catch(Exception $e){
				return View('galleryImages.pages.index');
		    } 
		}else{  
		    try{
				$galleryImages = GalleryImage::latest()->simplePaginate(15);//Get all GalleryImage
				$galleryTypes = GalleryImage::select('ref_class');
				return View('galleryImages.pages.index',compact('galleryImages',200)); 
				
			}catch(Exception $e){
				return View('galleryImages.pages.index');
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
		return View('galleryImages.pages.create');
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
			$galleryImage = new GalleryImage();
			$data = $this->validate($request, [
				'ref_class'=>'required|max:60',
				'ref_id'=>'required|max:6',	
				'title'=>'required|max:60',				
				'description'=>'required|max:120',
			]);
			$filer = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);	
			
		   if ($request->hasFile('file')) {
			   $imagefile = $request->file('file');							 
			    $image = $imagefile->getClientOriginalName();//get original image name
				$path = $imagefile->store('images','public');//get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }
		 
			$galleryImage->saveGalleryImage($data);
			
			$response = Response::json(['success' => ['message' => 'GalleryImage has been created successfully.','data' => $path,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'GalleryImage cannot be created, validation error!'] ], 422);
			
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
			
			$galleryImage = GalleryImage::findOrFail($id); //Get whole GalleryImage 
			
			return View ('galleryImages.pages.show',compact('galleryImage',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'GalleryImage cannot be found.'] ], 404);
			
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
			$galleryImage = GalleryImage::where('id', $id)->first(); //Find the first result where GalleryImage id = $id
		
			return View('galleryImages.pages.edit',compact('galleryImage',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'GalleryImage cannot be found.'] ], 404);
			
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
			$galleryImage = new GalleryImage();
			$data = $this->validate($request, [
				'ref_class'=>'required|max:60',
				'ref_id'=>'required|max:6',		
				'title'=>'required|max:60',						
				'description'=>'required|max:120',
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			$data['image'] = $request->oldimage;
			$data['imagePath'] = $request->oldpath;
			
			$galleryImage->updateGalleryImage($data);
			
			$response = Response::json(['success' => ['message' => 'GalleryImage has been updated.','data' => $galleryImage,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'GalleryImage cannot be updated, validation error!'] ], 422);
			
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
			$galleryImage = GalleryImage::findOrFail($id); //Find GalleryImage of id = $id
			Storage::disk('public')->delete($galleryImage->imagePath);
			$galleryImage->delete();
			
			$response = Response::json(['success' => ['message' => 'GalleryImage  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'GalleryImage cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
