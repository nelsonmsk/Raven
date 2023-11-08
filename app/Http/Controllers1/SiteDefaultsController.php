<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\SiteDefaults;

class SiteDefaultsController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$siteDefaults = SiteDefaults::all();//Get all SiteDefaults

			$response = Response::json($siteDefaults, 200);
			
			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be found.'] ], 404);
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
			$siteDefaults = new SiteDefaults();
			$data = $this->validate($request, [
				'appTitle'=>'required|max:30',
				'introText'=>'required|max:30',
				'linkText'=>'required|max:30',
				'aboutText'=>'required|max:120',
				'facebook'=>'required|max:30',
				'twitter'=>'required|max:30',
				'instagram'=>'required|max:30',
				'whatsapp'=>'required|max:30',	
				'phone'=>'required|max:15',
				'email'=>'required|max:30',
				'address'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		   
			$siteDefaults->saveSiteDefaults($data);
			
			$response = Response::json(['success' => ['message' => 'SiteDefaults have been created successfully.','data' => $siteDefaults,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be created, validation error!'] ], 422);
			
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
			$siteDefaults = SiteDefaults::findOrFail($id); //Find SiteDefaults of id = $id

			$response = Response::json($siteDefaults, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be found.'] ], 404);
			
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
			$siteDefaults = SiteDefaults::where('id', $id)->first(); //Find the first result where SiteDefaults id = $id
		
			$response = Response::json($siteDefaults, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be found.'] ], 404);
			
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
			$siteDefaults = new SiteDefaults();
			$data = $this->validate($request, [
				'appTitle'=>'required|max:30',
				'introText'=>'required|max:30',
				'linkText'=>'required|max:30',
				'aboutText'=>'required|max:120',
				'facebook'=>'required|max:30',
				'twitter'=>'required|max:30',
				'instagram'=>'required|max:30',
				'whatsapp'=>'required|max:30',	
				'phone'=>'required|max:15',
				'email'=>'required|max:30',
				'address'=>'required|max:30',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$siteDefaults->updateSiteDefaults($data);
			
			$response = Response::json(['success' => ['message' => 'SiteDefaults have been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be updated, validation error!'] ], 422);
			
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
			$siteDefaults = SiteDefaults::findOrFail($id); //Find SiteDefaults of id = $id
			$siteDefaults->delete();
			
			$response = Response::json(['success' => ['message' => 'SiteDefaults have been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'SiteDefaults cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
