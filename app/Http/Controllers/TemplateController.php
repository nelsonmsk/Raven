<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use Illuminate\Pagination\Paginator;


use App\Models\GalleryImage;
use App\Models\Plan;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Booking;
use App\Models\Profile;
use App\Models\Testimonial;
use App\Models\Feature;
use App\Models\Banner;
use App\Models\Service;
use App\Models\AppDefaults;
use App\Models\Support;

class TemplateController extends Controller
{

    /**
     * Show the application default template.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      try{
		 
		 $appDefaults = AppDefaults::latest()->first();					//Get the appDefaults
		 $profiles = Profile::whereBetween('id', [1, 4])->get();		//Get 4 Profiles available with pageId 1-4
		 $testimonials = Testimonial::whereBetween('pageId', [1, 3])->get();
		 $services = Service::whereBetween('pageId',[1,7])->get();
		 $features = Feature::whereBetween('pageId',[1,4])->get();
		 $plans = Plan::whereBetween('pageId',[1,3])->get();		 
		 $banners = Banner::whereBetween('pageId',[1,4])->get();
		 $projects = Project::whereBetween('id',[1,10])->get();
		 $projectTypes = ProjectType::whereBetween('id',[1,6])->get();
		 $supports = Support::whereBetween('id',[1,10])->get();	
		 
		 $brandImage = GalleryImage::where('ref_class', 'AppDefaults')
										->latest()
										->get();
		 $aboutImage = GalleryImage::where('ref_class', 'About')
										->latest()
										->get();										
		 $servicesImages = GalleryImage::where('ref_class', 'Services')
										->latest()
										->simplePaginate(2);										
		 $bannersImages = GalleryImage::where('ref_class', 'Banners')
										->latest()
										->simplePaginate(2);		 
		 $projectsImages = GalleryImage::where('ref_class', 'Projects')
										->latest()
										->simplePaginate(12);
		 $projectTypesImages = GalleryImage::where('ref_class', 'ProjectTypes')
										->latest()
										->simplePaginate(12);										
		 $testimonialsImages = GalleryImage::where('ref_class', 'Testimonials')
										->latest()
										->simplePaginate(3);
		 $clientsLogos = GalleryImage::where('ref_class', 'Clients')
										->latest()
										->simplePaginate(5);										
			$rtemplate = [
				'appDefaults'=>$appDefaults,
				'profiles' => $profiles,
				'testimonials' => $testimonials,
				'services' => $services,
				'features' =>$features,
				'plans' =>$plans,				
				'banners'=>$banners,
				'projects'=>$projects,
				'projectTypes'=>$projectTypes,
				'supports'=>$supports,	
				'brandImage'=>$brandImage,
				'aboutImage'=>$aboutImage,				
				'servicesImages'=>$servicesImages,				
				'bannersImages'=>$bannersImages,
				'projectsImages'=>$projectsImages,
				'projectTypesImages'=>$projectTypesImages,				
				'testimonialsImages'=>$testimonialsImages,
				'clientsLogos'=>$clientsLogos,				
			];
			$status = 200;
			return View('/Welcome',compact('rtemplate','status'));
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Templates cannot be found.'] ], 404);		
			return 	$response;
	   } 
 
   }
   
      /**
     * Show the resource with the specified $id.
     * find the projects associated with projectType $id
     * @param  int  $show
     * @return \Illuminate\Http\Response
     */	
	public function show($id)
    {
		 try{	
			 $project_type_name = ProjectType::select('name')->where('id', $id )->get();
			 $projects = Project::where('type', $project_type_name )->get();					 
			 $projectsImages = GalleryImage::where('ref_class', 'Projects')
											->latest()
											->simplePaginate(12);
			 $appDefaults = AppDefaults::latest()->first();											
				$rtemplate = [
					'projects'=>$projects,
					'projectsImages'=>$projectsImages,	
					'appDefaults'=>$appDefaults,					
				];	
				$status = "200";				
				return View('/project-view',compact('rtemplate','status'));
			}catch(Exception $e){
				$response = Response::json(['error' => ['message' => 'Projects cannot be found.'] ], 404);		
				return 	$response;
		   }		
   }  
      /**
     * Get the default template resources for the admin.
     *
     * @param  null
     * @return \Illuminate\Http\Response
     */   
	public function getTemplate()
	{
	 try{		 
		 $appDefaults = AppDefaults::latest()->first();							//Get the first appDefaults  available for templates							
			$rtemplate = [
				'appDefaults'=>$appDefaults,
			];		
		return $response = Response::json(['rtemplate' => $rtemplate ], 200);	
		}catch(Exception $e){
			$response = Response::json(['error' => ['message' => 'Templates cannot be found.'] ], 404);		
			return 	$response;
		} 	
	}
	

}
