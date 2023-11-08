<?php

namespace App\Http\Controllers;

use App\Models\Florist;
use App\Models\GalleryImage;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;

class FloristsController extends Controller
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
				$florists = Florist::Search($request->search_text)->SimplePaginate(15) ; //Get all florists
				$status = '200';
				return view('florists.pages.index',compact('florists','status'));
				
			}catch(Exception $e){
				return view('florists.pages.index');
		    }
		}else{
		    try{	
				$floristsImages = GalleryImage::latest()->where('ref_class','Florists')->simplePaginate(15) ; //Get all flowers			
				$florists = Florist::latest()->simplePaginate(15) ; //Get all florists
				$status = '200';
				return view('florists.pages.index',compact('florists','floristsImages','status'));
				
			}catch(Exception $e){
				return view('florists.pages.index');
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
			return View('florists.pages.create');
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
			$florist = new Florist();
			$data = $this->validate($request, [
				'name'=>'required|max:60',			
				'email'=>'required|email|max:60',
				'phone'=>'required|max:30',		
				'bio'=>'required|max:150',	
				'experience'=>'required|max:60',
				'speciality'=>'required|max:60',
				'rates'=>'required|max:30',				
			]);
		   
			$florist->saveFlorist($data);
			
			$response = Response::json(['success' => ['message' => 'Florist has been created successfully.'] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Florist cannot be created, validation error!'] ], 422);
			
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
			$florist = Florist::findOrFail($id); //Find Service of id = $id
			$galleryImage = GalleryImage::where('ref_class','Florists')
											->where('ref_id',$id)->get();
			$status = '200';
			return View('florists.pages.show',compact('florist','galleryImage','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Florist cannot be found.'] ], 404);
			
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
			$florist = Florist::where('id', $id)->first(); //Find the first result where Florist id = $id
			$status = '200';
			return View('florists.pages.edit',compact('florist','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Florist cannot be found.'] ], 404);
			
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
			$florist = new Florist();
			$data = $this->validate($request, [
				'name'=>'required|max:60',			
				'email'=>'required|email|max:60',
				'phone'=>'required|max:30',		
				'bio'=>'required|max:150',	
				'experience'=>'required|max:60',
				'speciality'=>'required|max:60',	
				'rates'=>'required|max:30',					
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			
			$florist->updateFlorist($data);
			
			$response = Response::json(['success' => ['message' => 'Florist has been updated.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Florist cannot be updated, validation error!'] ], 422);
			
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
			$florist = Florist::findOrFail($id); //Find Florist of id = $id			
			$florist->delete();
			
			$response = Response::json(['success' => ['message' => 'Florist has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Florist cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}