<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Testimonial;

class TestimonialsController extends Controller
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
				$testimonials = Testimonial::Search($request->search_text)->simplePaginate(15);//Get all Testimonials
				return View('testimonials.pages.index',compact('testimonials'));
				
			}catch(Exception $e){
				return View('testimonials.pages.index');
		    }  
		}else{
			try{
				$testimonials = Testimonial::latest()->simplePaginate(15);//Get all Testimonials
				return View('testimonials.pages.index',compact('testimonials'));
				
			}catch(Exception $e){
				return View('testimonials.pages.index');
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
		return	View('testimonials.pages.create');
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
			$testimonial = new Testimonial();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'title'=>'required|max:60',				
				'comment'=>'required|max:150',
				'pageId'=>'required',
			]);
			$testimonial->saveTestimonial($data);	
			$response = Response::json(['success' => ['message' => 'Testimonial has been created successfully.','data' => $testimonial,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Testimonial cannot be created, validation error!'] ], 422);
			
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
			$testimonial = Testimonial::findOrFail($id); //Find Testimonial of id = $id
			$status = '200';
			return View('testimonials.pages.show',compact('testimonial','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Testimonial cannot be found.'] ], 404);
			
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
			$testimonial = Testimonial::where('id', $id)->first(); //Find the first result where Testimonial id = $id
			$status = '200';
			return View('testimonials.pages.edit',compact('testimonial','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Testimonial cannot be found.'] ], 404);
			
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
			$testimonial = new Testimonial();
			$data = $this->validate($request, [
				'name'=>'required|max:60',
				'title'=>'required|max:60',				
				'comment'=>'required|max:150',
				'pageId'=>'required',
			]);
			
		    $data['id'] = $id;		
			$testimonial->updateTestimonial($data);
			
			$response = Response::json(['success' => ['message' => 'Testimonial has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Testimonial cannot be updated, validation error!'] ], 422);
			
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
			$testimonial = Testimonial::findOrFail($id); //Find Testimonial of id = $id
			$testimonial->delete();
			
			$response = Response::json(['success' => ['message' => 'Testimonial has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Testimonial cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
