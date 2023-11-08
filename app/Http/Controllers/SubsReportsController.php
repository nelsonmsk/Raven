<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Response;
use Exception;
use PdfReport;

use App\Models\MailSubscription;
use App\Models\AppDefaults;
use App\Models\SubsReport;


class SubsReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index(Request $request)
    {
		if($request->has('search_text')){	
			try{
				$subsReports = SubsReport::Search($request->search_text)->simplePaginate(15);//Get all SubsReports						
				return View('reports.mailSubscriptions.index',compact('subsReports'));
		
			}catch(Exception $e){
				return View('reports.mailSubscriptions.index');
			}
		}else{
			try{
				$subsReports = SubsReport::latest()->simplePaginate(15);//Get all SubsReports						
				return View('reports.mailSubscriptions.index',compact('subsReports'));
		
			}catch(Exception $e){
				return View('reports.mailSubscriptions.index');
			}
		}
    }


    public function create()
    { 
	
		return view('reports.mailSubscriptions.create');
	
    }

	public function store(Request $request){
		 
		$subsReport = new SubsReport(); 
		$data = $this->validate($request, [
				'title'=>'required|max:90',
				'subtitle'=>'required|max:60',
				'fromdate'=>'required|date|before:todate',
				'todate'=>'required|date|after:fromdate',
		]);
		$data['status'] = $request->input('status');	

		$fromDate = $request['fromdate'];
		$toDate = $request['todate'];
		$status = $request['status'];		
					
	   //generate the subsquery using an if-else statement based on the  user request inputs
		$filename = 'reports/mailSubscriptions/'.$request['title'].'.csv';	   
		if($status == "N/A" ){
			//retrieve the query results from the database
		   $subsquery = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
							->latest()
							->get();
			
		}else if($status !== "N/A"){
			//retrieve the query results from the database
		   $subsquery = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
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
			 $columns = array('Id','Email','Status','Created At','Updated At');
			 fputcsv($fd, $columns);
			 //loop through the query results to create a multidimensional array and write it to the file
			 foreach ($subsquery as $mailSubscription) {			 
				$fdata = array(
					'Id' => $mailSubscription->id,					
					'Email' => $mailSubscription->email, 
					'Status' => $mailSubscription->status,  
					'Created At' => $mailSubscription->created_at, 
 					'Updated At' => $mailSubscription->updated_at, 					
				);
				fputcsv($fd, $fdata);
			}
			//close file
			fclose($fd);

			//Storage::disk('public')->put($filename ,$path);
			//Storage::disk('s3')->put('',$cvsPath,$path);	

			//add file storage path to the data array
			$data['subsquery'] = $path;			
		
		try {
			//save report data to the database			
			$subsReport->saveSubsReport($data);
			
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
			$data['fromdate']= $request['fromdate'];
			$data['todate']= $request['todate'];
			$data['status']= $request['status'];
			$data['subsquery']= $request['subsquery'];				
			$data['username']= $request['username'];

			/* This is database method of previewing a report			
			if($data['status'] == "N/A" ){

				 $mailSubscriptions = MailSubscription::whereBetween('created_at', [$data['fromdate'], $data['todate']])
									->orderBy('created_at', 'DESC')
									->get();

			}else if($data['status'] !== "N/A" ){


				 $mailSubscriptions = MailSubscription::whereBetween('created_at', [$data['fromdate'], $data['todate']])
									->where('status', $data['status'])
									->orderBy('created_at', 'DESC')							
									->get();
			}
			*/
			 
			 //this is the file method of previewing a report
			 //generated file name
				$filename = 'reports/mailSubscriptions/'.$request['title'].'.csv';
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
									'email' => $value[1], 
									'status' => $value[2],  
									'created_at' => $value[3], 
									'updated_at' => $value[4],								
							];	
							$outarray = $inarray;	
						}		
						$all_data = $outarray;
					};
					fclose($rfile);	
					unset($all_data[0]);
					//cast array into eloquent collection
					$mailSubscriptions = MailSubscription::hydrate($all_data);
					
					return view('reports.mailSubscriptions.preview',compact('mailSubscriptions','data'));			
				}else{
					return view('reports.mailSubscriptions.preview',compact('data'));			
				}
				
			}catch(Exception $e){
					
					$response = Response::json(['error' => ['message' => 'Report cannot be previewed, validation error!'] ], 422);
					
					return 	$response;		
			}		 
	}		
   

	public function displayReport(Request $request){
     
		$id= $request['id'];
        $title = $request['title'];
        $subtitle = $request['subtitle'];
        $fromDate = $request['fromdate'];
        $toDate = $request['todate'];
		$status = $request['status'];				
		$username = $request['username'];	

		$meta = [ // For displaying filters description on header
			 'From Date' =>  $fromDate,
			 'To Date' =>    $toDate
		];
	
		$result = AppDefaults::select(['companyName'])
							->first();
							
		$pagehead = $result['companyName'];
	

		//generate the query builder using an if-else statement based on the  user request inputs

		if($status == "N/A" ){

		   $queryBuilder = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
								->orderBy('created_at', 'DESC');

		}else if($status !== "N/A"){

		   $queryBuilder = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
							->where('status', $status)
							->orderBy('created_at', 'DESC');
		}


		$columns = [ // Set Column to be displayed
			'ID' => 'id',
			'Email' => 'email',
			'Status' => 'status',
			'Created' => 'created_at',
			'Modified' => 'updated_at',
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
			$subsReport = SubsReport::findOrFail($id); //Find SubsReport of id = $id
			$status = '200';
			return View('reports.mailSubscriptions.show',compact('subsReport','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'SubsReport cannot be found.'] ], 404);
			
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
			$subsReport = SubsReport::findOrFail($id); //Find the first result where SubsReport id = $id
			$status = '200';
			return View('reports.mailSubscriptions.edit',compact('subsReport', 'status'));
			
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
		
		$subsReport = new SubsReport();
		$data = $this->validate($request, [
			'title'=>'required|max:90',
			'subtitle'=>'required|max:90',
			'fromdate'=>'required|date|before:todate',
			'todate'=>'required|date|after:fromdate',
			'status'=>'required',			
		]);
		$data['id'] = $id;
		$data['subsquery']= $request['subsquery'];				
		$data['username']= $request['username'];
		
		$fromDate = $request['fromdate'];
		$toDate = $request['todate'];
		$status = $request['status'];		
						

		//generate the subsquery using an if-else statement based on the  user request inputs
		$filename = 'reports/mailSubscriptions/'.$request['title'].'.csv';	   
		if($status == "N/A" ){
			//retrieve the query results from the database
		   $subsquery = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
							->latest()
							->get();
			
		}else if($status !== "N/A"){
			//retrieve the query results from the database
		   $subsquery = MailSubscription::select(['id','email','status','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
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
			 $columns = array('Id','Email','Status','Created At','Updated At');
			 fputcsv($fd, $columns);
			 //loop through the query results to create a multidimensional array and write it to the file
			 foreach ($subsquery as $mailSubscription) {			 
				$fdata = array(
					'Id' => $mailSubscription->id,					
					'Email' => $mailSubscription->email, 
					'Status' => $mailSubscription->status,  
					'Created At' => $mailSubscription->created_at, 
 					'Updated At' => $mailSubscription->updated_at, 					
				);
				fputcsv($fd, $fdata);
			}
			//close file
			fclose($fd);

			//Storage::disk('public')->put($filename ,$path);
			//Storage::disk('s3')->put('',$cvsPath,$path);	

			//add file storage path to the data array
			$data['subsquery'] = $path;	
			
		try {
		//update report data to the database				
			$subsReport->updateSubsReport($data);	
			
			
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
			$subsReport = SubsReport::findOrFail($id); //Find SubsReport of id = $id
				if (Storage::disk('public')->exists($subsReport->subsquery)) {					
							Storage::disk('public')->delete($subsReport->subsquery);
					}			
			$subsReport->delete();
			
			$response = Response::json(['success' => ['message' => 'Report  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Report cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
 
 
}