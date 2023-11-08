<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Exception;

use App\Models\AppDefaults;

class AppDefaultsController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$appDefaults = AppDefaults::latest()->simplePaginate(6);//Get 5 AppDefaults
				return View('app defaults.pages.index',compact('appDefaults'));
		}catch(Exception $e){

			return $response = Response::json(['error' => ['message' => 'App Defaults cannot be found.'] ], 404);
	   }  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return View('app defaults.pages.create');
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
			$appDefaults = new AppDefaults();
			$data = $this->validate($request, [
				'companyName'=>'required|max:60',
				'appTitle'=>'required|max:30',	
				'brandHeading'=>'required|max:60',				
				'introText'=>'required|max:60',
				'aboutText'=>'required|max:450',
				'introVideo'=>'url|max:90',				
				'facebook'=>'url|unique:app_defaults|max:90',
				'twitter'=>'url|unique:app_defaults|max:90',
				'instagram'=>'url|unique:app_defaults|max:90',
				'googleplus'=>'url|unique:app_defaults|max:90',
				'youtube'=>'url|unique:app_defaults|max:90',
				'linkedin'=>'url|unique:app_defaults|max:90',				
				'whatsapp'=>'max:20',	
				'phone'=>'required|max:20',
				'email'=>'required|email|unique:app_defaults|max:60',
				'address'=>'required|max:90',
				'contactText'=>'max|150',
			]);
		   
			$appDefaults->saveAppDefaults($data);
			
			$response = Response::json(['success' => ['message' => 'AppDefaults have been created successfully.','data' => $appDefaults,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			
			$response = Response::json(['error' => ['message' => 'AppDefaults cannot be created', $data->messages()->all(),]], 422);
			
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
			$appDefaults = AppDefaults::where('id', $id)->first(); //Find AppDefaults of id = $id
			$status = '200';
			return View('app defaults.pages.show',compact('appDefaults','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'AppDefaults cannot be found.'] ], 404);
			
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
			$appDefaults = AppDefaults::where('id', $id)->first(); //Find the first result where AppDefaults id = $id
				$status = '200';
				return View('app defaults.pages.edit',compact('appDefaults','status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'AppDefaults cannot be found.'] ], 404);
			
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
			$appDefaults = new AppDefaults();
			$data = $this->validate($request, [
				'companyName'=>'required|max:60',
				'appTitle'=>'required|max:30',
				'brandHeading'=>'required|max:60',				
				'introText'=>'required|max:60',
				'aboutText'=>'required|max:450',
				'introVideo'=>'url|max:90',				
				'facebook'=>'url|max:90',
				'twitter'=>'url|max:90',
				'instagram'=>'url|max:90',
				'googleplus'=>'url|max:90',
				'youtube'=>'url|max:90',
				'linkedin'=>'url|max:90',
				'whatsapp'=>'max:20',	
				'phone'=>'required|max:20',
				'email'=>'required|email|max:60',
				'address'=>'required|max:90',
				'contactText'=>'max|150',
			]);
			
		    $data['id'] = $id;
			
			$appDefaults->updateAppDefaults($data);
			
			$response = Response::json(['success' => ['message' => 'AppDefaults have been updated.','data' => $appDefaults,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'AppDefaults cannot be updated, validation error!'] ], 422);
			
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
			$appDefaults = AppDefaults::findOrFail($id); //Find AppDefaults of id = $id
			$appDefaults->delete();
			
			$response = Response::json(['success' => ['message' => 'AppDefaults have been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'AppDefaults cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
