<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Response;
use Exception;
use PdfReport;

use App\Models\Project;
use App\Models\AppDefaults;
use App\Models\ProjectsReport;


class ProjectsReportsController extends Controller
{
    public function __contruct()
    {
        $this->middleware("auth");
    }


    public function index(Request $request)
    {
		if($request->has('search_text')){
			try{
				$projectsReports = ProjectsReport::Search($request->search_text)->simplePaginate(15);//Get all ProjectsReports				
				return View('reports.projects.index',compact('projectsReports'));	
				
			}catch(Exception $e){
				return View('reports.projects.index');		
		   } 
		}else{
			try{
				$projectsReports = ProjectsReport::latest()->simplePaginate(15);//Get all ProjectsReports				
				return View('reports.projects.index',compact('projectsReports'));	
				
			}catch(Exception $e){
				return View('reports.projects.index');		
		   } 
		}
    }


    public function create()
    { 
	
		return view('reports.projects.create');
	
    }

	public function store(Request $request){
		 
		$projectsReport = new ProjectsReport(); 
		$data = $this->validate($request, [
				'title'=>'required|max:90',
				'subtitle'=>'required|max:60',
				'sdate'=>'required|date|before:edate',
				'edate'=>'required|date|after:sdate',
		]);
		$data['status'] = $request->input('status');	

		$startDate = $request['sdate'];
		$endDate = $request['edate'];
		$status = $request['status'];		
					

	   //generate the subsquery using an if-else statement based on the  user request inputs
		$filename = 'reports/projects/'.$request['title'].'.csv';	
		if($status == "N/A" ){
			//retrieve the query results from the database
		   $subsquery = Project::select(['id','name','status','sdate','edate'])
							->whereBetween('created_at', [$startDate, $endDate])
							->latest()
							->get();

		}else if($status !== "N/A"){
			//retrieve the query results from the database
		   $subsquery = Project::select(['id','name','status','sdate','edate'])
							->whereBetween('created_at', [$startDate, $endDate])
							->where('status', $status)
							->latest()
							->get();
		}
			//generate the file storage path				
			$path = Storage::disk('public')->path($filename);
			
			 //$csvFile = tmpfile();
			// $csvPath = stream_get_meta_data($csvFile)['uri'];
			 
			//open the file for writing			 
			 $fd = fopen($path, 'w');
			 //create a columns array and write it to the file
			 $columns = array('Id','Name','Status','Start Date','End Date');
			 fputcsv($fd, $columns);		
			 //loop through the query results to create a multidimensional array and write it to the file
			 foreach ($subsquery as $project) {			 
				$fdata = array(
					'Id' => $project->id,					
					'Name' => $project->name, 
					'Status' => $project->status,  
					'Start Date' => $project->sdate, 
 					'End Date' => $project->edate, 					
				);
				fputcsv($fd, $fdata);
			}
			//close file
			fclose($fd);		
			
			//Storage::disk('public')->put($filename ,$path);
			//Storage::disk('s3')->putFileAs('',$cvsPath,$path);	

			//add file storage path to the data array
			$data['subsquery'] = $path;							
		
		try {
			//save report data to the database			
			$projectsReport->saveProjectsReport($data);	
			
			$response = Response::json(['success' => ['message' => 'Report has been created successfully.','data' => $data,] ], 201); 
						
			return  $response;  
		
		}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Report cannot be updated, validation error!'] ], 422);
				
				return 	$response;		
		}
	}	
 
    public function preview (Request $request){
		try{
			$data['id']= $request['id'];
			$data['title']= $request['title'];
			$data['subtitle']= $request['subtitle'];
			$data['sdate']= $request['sdate'];
			$data['edate']= $request['edate'];
			$data['status']= $request['status'];
			$data['subsquery']= $request['subsquery'];				
			$data['username']= $request['username'];

			/* This is database method of previewing a report			
			if($data['status'] == "N/A" ){
				 $projects = Project::whereBetween('sdate', [$data['sdate'], $data['edate']])
									->latest()
									->get();
			}else if($data['status'] !== "N/A" ){
				 $projects = Project::whereBetween('sdate', [$data['sdate'], $data['edate']])
									->where('status', $data['status'])
									->latest()							
									->get();
			}
			*/
			
			//this is the file method of previewing a report
			//generated file name
			$filename = 'reports/projects/'.$request['title'].'.csv';
			//get the file storage path
			$path = Storage::disk('public')->path($filename);
			//open the file for reading
			$rfile = fopen($path, "r");		
			$all_data = array();
			//check whether the file is present
			if($rfile){
				//loop through the file to retrieve the data
				while ( ($rdata[] = fgetcsv($rfile, 1024, ",")) !== FALSE ) {
					$outarray = array();
					//loop through each array to change from indexed to associative array
					foreach($rdata as $key => $value){
						$inarray[$key] = [
								'id' => $value[0],					
								'name' => $value[1], 
								'status' => $value[2],  
								'sdate' => $value[3], 
								'edate' => $value[4],								
						];	
						$outarray = $inarray;	
					}		
					$all_data = $outarray;
				};
				fclose($rfile);	
				unset($all_data[0]);
				//cast array into eloquent collection
				$projects = Project::hydrate($all_data);
				
				return view('reports.projects.preview',compact('projects','data')); 			
			}else{
				return view('reports.projects.preview',compact('data'));			
			}					 
		}catch(Exception $e){

				$response = Response::json(['error' => ['message' => 'ProjectsReport cannot be previewed.'] ], 404);
				
				return 	$response;
		}		 

	}
   

	public function displayReport(Request $request){
     
		$id= $request['id'];
        $title = $request['title'];
        $subtitle = $request['subtitle'];
        $startDate = $request['sdate'];
        $endDate = $request['edate'];
		$status = $request['status'];				
		$username = $request['username'];	

		$meta = [ // For displaying filters description on header
			 'Start Date' =>  $startDate,
			 'End Date' =>    $endDate
		];
	
		$result = AppDefaults::select(['companyName'])
							->first();
							
		$pagehead = $result['companyName'];
	

		//generate the query builder using an if-else statement based on the  user request inputs

		if($status == "N/A" ){

		   $queryBuilder = Project::select(['id','name','status','sdate','edate'])
							->whereBetween('sdate', [$startDate, $endDate])
							->whereBetween('edate', [$startDate, $endDate])							
								->orderBy('sdate', 'DESC');

		}else if($status !== "N/A"){

		   $queryBuilder = Project::select(['id','name','status','sdate','edate'])
							->whereBetween('sdate', [$startDate, $endDate])
							->whereBetween('edate', [$startDate, $endDate])							
							->where('status', $status)
							->orderBy('sdate', 'DESC');
		}


		$columns = [ // Set Column to be displayed
			'ID' => 'id',
			'Name' => 'name',
			'Status' => 'status',
			'Start Date' => 'sdate',
			'End Date' => 'edate',
		];




		// Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
		return  PdfReport::of($pagehead, $title, $subtitle, $meta, $queryBuilder, $columns)
						->editColumn('Created', [ // Change column class or manipulate its data for displaying to report
							'displayAs' => function($result) {
								return $result->created_at->format('d-m-Y h:m:s');
							},
							'class' => 'left italic-red'
						])
						->editColumn('Modified', [ // Change column class or manipulate its data for displaying to report
							'displayAs' => function($result) {
								return $result->updated_at->format('d-m-Y h:m:s');
							},
							'class' => 'left italic-blue'
						])	
						->editColumns(['ID', 'Email','Status',], [ // Mass edit column
							'class' => 'pg-4 left'
						])	
						->setCss([
							'.pg-4' => 'padding: 12px;'						
						])						
						->setCss([					
							'.italic-blue' => 'color: blue;font-style: italic;',						
							'.italic-red' => 'color: red;font-style: italic;',
						])						
						->stream(); // other available method: download() to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
						
						
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
			$projectsReport = ProjectsReport::findOrFail($id); //Find ProjectsReport of id = $id
			$status = '200';
			return View('reports.projects.show',compact('projectsReport','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'ProjectsReport cannot be found.'] ], 404);
			
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
			$projectsReport = ProjectsReport::findOrFail($id); //Find the first result where ProjectsReport id = $id
			$status = '200';
			return View('reports.projects.edit',compact('projectsReport', 'status'));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Report cannot be found.'] ], 404);
			
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
		
			$projectsReport = new ProjectsReport();
			$data = $this->validate($request, [
				'title'=>'required|max:90',
				'subtitle'=>'required|max:90',
				'sdate'=>'required|date|before:edate',
				'edate'=>'required|date|after:sdate',
				'status'=>'required',			
			]);
		    $data['id'] = $id;
			$data['subsquery']= $request['subsquery'];				
			$data['username']= $request['username'];
			
			$startDate = $request['sdate'];
			$endDate = $request['edate'];
			$status = $request['status'];		
						

		   //generate the subsquery using an if-else statement based on the  user request inputs

			if($status == "N/A" ){

			   $subsquery = Project::select(['id','name','status','created_at','updated_at'])
								->whereBetween('created_at', [$startDate, $endDate])
								->latest()
								->get();

			}else if($status !== "N/A"){

			   $subsquery = Project::select(['id','name','status','created_at','updated_at'])
								->whereBetween('created_at', [$startDate, $endDate])
								->where('status', $status)
								->latest()
								->get();
			}
			
			//generate the file storage path									
			if (Storage::disk('public')->exists($filename)) {
					Storage::disk('public')->delete($filename);
					$path = Storage::disk('public')->path($filename);				 
			}else{			
				$path = Storage::disk('public')->path($filename);
			}
			 //$csvFile = tmpfile();
			// $csvPath = stream_get_meta_data($csvFile)['uri'];
			 
			//open the file for writing			 
			 $fd = fopen($path, 'w');
			 //create a columns array and write it to the file
			 $columns = array('Id','Name','Status','Start Date','End Date');
			 fputcsv($fd, $columns);		
			 //loop through the query results to create a multidimensional array and write it to the file
			 foreach ($subsquery as $project) {			 
				$fdata = array(
					'Id' => $project->id,					
					'Name' => $project->name, 
					'Status' => $project->status,  
					'Start Date' => $project->sdate, 
 					'End Date' => $project->edate, 					
				);
				fputcsv($fd, $fdata);
			}
			//close file
			fclose($fd);		
			
			//Storage::disk('public')->put($filename ,$path);
			//Storage::disk('s3')->putFileAs('',$cvsPath,$path);	

			//add file storage path to the data array
			$data['subsquery'] = $path;	
			
			try {
			//update report data to the database				
				$projectsReport->updateProjectsReport($data);	
				
				$response = Response::json(['success' => ['message' => 'Report has been updated successfully.','data' => $data,] ], 201); 
							
				return  $response;  
			
			}catch(Exception $e){
					
					$response = Response::json(['error' => ['message' => 'Report cannot be updated, validation error!'] ], 422);
					
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
			$projectsReport = ProjectsReport::findOrFail($id); //Find ProjectsReport of id = $id
					if (Storage::disk('public')->exists($projectsReport->subsquery)) {					
							Storage::disk('public')->delete($projectsReport->subsquery);
					}			
			$projectsReport->delete();
			
			$response = Response::json(['success' => ['message' => 'Report  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Report cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
 
 
}