<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Profile;
use App\Models\User;

class ProfilesController extends Controller
{
 
   /**
     * Show the index for the profile(s)
     *
    * @return \Illuminate\View\View
     */
  
  public function index(Request $request)
    {
		if(Auth::user()->isAdmin()){
		    if($request->has('search_text')){			
			    try{	
					//search the profiles using the search_text
					$profiles = Profile::Search($request->search_text)->simplePaginate(15); 
					$status = '200';				
					return view('profiles.pages.index',compact('profiles','status'));
					
				}catch(Exception $e){
					return view('profiles.pages.index');
			    }
			}else{
				try{
					//Get all profiles
					$profiles = Profile::latest()->simplePaginate(15); //Get all profiles	
					$status = '200';
					return view('profiles.pages.index',compact('profiles','status'));
					
				}catch(Exception $e){
					return view('profiles.pages.index');
			    }
			}
		}else{
			  try{	
					//Get Auth user profile
					$id = Auth::user()->id;
					$profile = User::find($id)->profile;
					$status = '200';
					return view('profile.pages.show',compact('profile','status'));
					
				}catch(Exception $e){
					return view('profile.pages.index');
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
		if(Auth::user()->isAdmin()){		
			return View('profiles.pages.create');
		}else{
			return View('profile.pages.create');	
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(Auth::user()->isAdmin()){		
			try{
				$data = $this->validate($request, [
					'name'=>'required|max:60',			
					'email'=>'required|email|unique:profiles|max:60',
					'phone'=>'required|max:30',
					'title'=>'required|max:30',
					'bio'=>'max:150',			
					'address'=>'max:90',
					'facebook'=>'url|unique:profiles|max:90',
					'twitter'=>'url|unique:profiles|max:90',
					'instagram'=>'url|unique:profiles|max:90',			
					'linkedin'=>'url|unique:profiles|max:90',
					'user_id'=>'required|max:30',					
					
				]);
			    $user_id = $request['user_id'];
				$user = User::find($user_id);
				if(!$user->profile){
					$profile = new Profile($data);				
				    $user->profile()->save($profile);
				    $response = Response::json(['success' => ['message' => 'Profile has been created successfully.','data' => $profile,] ], 201); 				  
				}else{
					$response = Response::json(['error' => ['message' => 'This User already has an Active Profile ','data' => $profile,] ], 201);
				}
					
				return  $response;	
				
			}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Profile cannot be created, validation error!'] ], 422);
				
				return 	$response;		
			}	
		}else{			
			try{
				$user = Auth::user();
				$data = $this->validate($request, [
					'name'=>'required|max:60',			
					'email'=>'required|email|unique:profiles|max:60',
					'phone'=>'required|max:30',
					'title'=>'required|max:30',
					'bio'=>'max:150',			
					'address'=>'max:90',
					'facebook'=>'url|unique:profiles|max:90',
					'twitter'=>'url|unique:profiles|max:90',
					'instagram'=>'url|unique:profiles|max:90',			
					'linkedin'=>'url|unique:profiles|max:90',					
				]);

				$data['user_id'] = $user->id;
				if(!$user->profile){				
					$profile = new Profile($data);			        	
				    $user->profile()->save($profile);
				    $response = Response::json(['success' => ['message' => 'Profile has been created successfully.','data' => $profile,] ], 201);				  
				}else{
					$response = Response::json(['error' => ['message' => 'You already have an Active Profile ','data' => $profile,] ], 201);
				}
				 	
				return  $response;	
				
			}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Profile cannot be created, validation error!'] ], 422);
				
				return 	$response;		
			}	
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
		if(Auth::user()->isAdmin()){
			  try{			
					$profile = Profile::where('id', $id)->first(); //Find the first result where Profile id = $id
					$status = '200';
					return View('profiles.pages.edit',compact('profile','status'));
			
				}catch(Exception $e){

					$response = Response::json(['error' => ['message' => 'Profile cannot be found.'] ], 404);
					
					return 	$response;
			   }
		}else{
			  try{	
					$pid = Auth::user()->id;
					$profile = User::findOrFail($pid)->profile;	
					$status = '200';
					return View('profile.pages.edit',compact('profile','status'));
			
				}catch(Exception $e){

					$response = Response::json(['error' => ['message' => 'Profile cannot be found.'] ], 404);
					
					return 	$response;
			   }	
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
		if(Auth::user()->isAdmin()){		
			try{			
				$profile = Profile::findOrFail($id); //Find the first result where Profile id = $id
				$status = '200';
				return View('profiles.pages.show',compact('profile','status'));
				
			}catch(Exception $e){

				$response = Response::json(['error' => ['message' => 'Profile cannot be found.'] ], 404);
				
				return 	$response;
		   }
		}else{
			$response = Response::json(['error' => ['message' => 'UnAuthorized Action.'] ], 405);	
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
		if(Auth::user()->isAdmin()){		
			try{
				
				$data = $this->validate($request, [
					'name'=>'required|max:60',			
					'email'=>'required|email|max:60',
					'phone'=>'required|max:30',
					'title'=>'required|max:30',
					'bio'=>'max:150',			
					'address'=>'max:90',
					'facebook'=>'url|max:90',
					'twitter'=>'url|max:90',
					'instagram'=>'url|max:90',			
					'linkedin'=>'url|max:90',
					'user_id'=>'required|max:10',				
				]);
				
				$user_id = $request['user_id'];			
				$data['id'] = $request['id'];
			    
				$user = User::find($user_id);
				$user->profile()->fill($data)->save();
				
				$response = Response::json(['success' => ['message' => 'Profile has been updated.','data' => $data,] ], 200); 
					
				return  $response;	
				
			}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Profile cannot be updated, validation error!'] ], 422);
				
				return 	$response;		
			}
		}else{
			try{
				
				$data = $this->validate($request, [
					'name'=>'required|max:60',			
					'email'=>'required|email|max:60',
					'phone'=>'required|max:30',
					'title'=>'required|max:30',
					'bio'=>'max:150',			
					'address'=>'max:90',
					'facebook'=>'url|max:90',
					'twitter'=>'url|max:90',
					'instagram'=>'url|max:90',			
					'linkedin'=>'url|max:90',
					'user_id'=>'required|max:10',				
				]);	
				$data['id'] = $request['id'];
				
				$profile = Auth::user()->profile()->find($id);
				$profile->fill($data)->save();
				
				$response = Response::json(['success' => ['message' => 'Profile has been updated.','data' => $data,] ], 200); 
					
				return  $response;	
				
			}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Profile cannot be updated, validation error!'] ], 422);
				
				return 	$response;		
			}			
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
		if(Auth::user()->isAdmin()){
			  try{	
					
					$profile = Profile::findOrFail($id); //Find Profile of id = $id
					$profile->delete();
					
					$response = Response::json(['success' => ['message' => 'Profile has been deleted.'] ], 200); 
						
					return  $response;	
			
				}catch(Exception $e){
					
					$response = Response::json(['error' => ['message' => 'Profile cannot be found.'] ], 404);
					
					return 	$response;		
				}
		}else{
			  try{	
					
					$profile = Auth::user()->profile()->find($id);				
					$profile->delete();	
					
					$response = Response::json(['success' => ['message' => 'Profile has been deleted.'] ], 200); 
						
					return  $response;	
			
				}catch(Exception $e){
					
					$response = Response::json(['error' => ['message' => 'Profile cannot be found.'] ], 404);
					
					return 	$response;		
				}			
		}					
    }

}
