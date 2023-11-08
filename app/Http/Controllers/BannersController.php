<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;

use App\Models\Banner;

class BannersController extends Controller
{
   /**
     * Show the index for the banner(s)
     *
    * @return \Illuminate\View\View
     */		
   public function index(Request $request)
    {
		if($request->has('search_text')){			
			try{	
				//search the banners using the search_text
				$banners = Banner::Search($request->search_text)->simplePaginate(15); 
				$status = '200';
				return view('banners.pages.index',compact('banners','status'));
				
			}catch(Exception $e){
				return view('banners.pages.index');
			}
		}else{
			try{
				//Get all banners
				$banners = Banner::latest()->simplePaginate(15); //Get all banners	
				$status = '200';
				return view('banners.pages.index',compact('banners','status'));
				
			}catch(Exception $e){
				return view('banners.pages.index');
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
		return View('banner.pages.create');	

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
			$banner = new Banner();
			$data = $this->validate($request, [
				'heading'=>'required|max:60',			
				'subheading'=>'required|max:90',
				'body'=>'max:250',	
				'pageId'=>'required',					
			]);
			$file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			if ($request->hasFile('file')) {
			   $imagefile = $request->file('file');							 
				$image = $imagefile->getClientOriginalName();//get original image heading
				$path = $imagefile->store('images','public');//get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
			}else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
			}			        	
			$banner->saveBanner($data);
			$response = Response::json(['success' => ['message' => 'Banner has been created successfully.','data' => $banner,] ], 201);					 	
			return  $response;	
			
		}catch(Exception $e){			
			$response = Response::json(['error' => ['message' => 'Banner cannot be created, validation error!'] ], 422);			
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
			$banner = Banner::where('id', $id)->first(); //Find the first result where Banner id = $id
			$status = '200';
			return View('banners.pages.edit',compact('banner','status'));
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Banner cannot be found.'] ], 404);	
			return 	$response;
		}
   }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $show
     * @return \Illuminate\Http\Response
     */	
  public function show($id)
    {
		
		try{			
			$banner = Banner::findOrFail($id); //Find the first result where Banner id = $id
			$status = '200';
			return View('banners.pages.show',compact('banner','status'));
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Banner cannot be found.'] ], 404);
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
			$banner = new Banner();				
			$data = $this->validate($request, [
				'heading'=>'required|max:60',			
				'subheading'=>'required|max:90',
				'body'=>'max:150',			
				'pageId'=>'required',				
			]);
			
			$file = $request->validate(['file'=>'required|mimes:jpeg,bmp,png',]);
			
		   if ($request->hasFile('file')) {
					if (Storage::disk('public')->exists($request->input('oldpath'))) {	//delete old image 				
							Storage::disk('public')->delete($request->input('oldpath'));
					}			   				
				$imagefile = $request->file('file');							 
				$image = $imagefile->getClientOriginalName();	    //get original image heading
				$path = $imagefile->store('images','public');       //get image Path
				
				$data['image'] = $image;
				$data['imagePath'] = $path;
		   }else{
				$data['image'] = 'none';
				$data['imagePath'] = 'none';
		   }	
			$data['id'] = $id;
			$banner->updateBanner($data);
			$response = Response::json(['success' => ['message' => 'Banner has been updated.','data' => $data,] ], 200); 	
			return  $response;	
			
		}catch(Exception $e){	
			$response = Response::json(['error' => ['message' => 'Banner cannot be updated, validation error!'] ], 422);	
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
			$banner = Banner::findOrFail($id); //Find Banner of id = $id
			if (Storage::disk('public')->exists($banner->imagePath)) {					
					Storage::disk('public')->delete($banner->imagePath);
			}
			$banner->delete();
			$response = Response::json(['success' => ['message' => 'Banner has been deleted.'] ], 200); 	
			return  $response;	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Banner cannot be found.'] ], 404);
			return 	$response;		
		}
    }

}
