<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Response;
use Exception;
use PdfReport;

use App\Models\Client;
use App\Models\AppDefaults;
use App\Models\ClientsReport;


class ClientsReportsController extends Controller
{
    public function __contruct()
    {
        $this->middleware("auth");
    }


    public function index(Request $request)
    {
		if($request->has('search_text')){			
			try{
				$clientsReports = ClientsReport::Search($request->search_text)->simplePaginate(15);//Get all ClientsReports			
				return View('reports.clients.index',compact('clientsReports'));
			
			}catch(Exception $e){
				return View('reports.clients.index');
		   }
		}else{
			try{
				$clientsReports = ClientsReport::latest()->simplePaginate(15);//Get all ClientsReports			
				return View('reports.clients.index',compact('clientsReports'));
			
			}catch(Exception $e){
				return View('reports.clients.index');
		   } 
		}
    }


    public function create()
    { 
		return view('reports.clients.create');
    }


	public function store(Request $request){
		 
		$clientsReport = new ClientsReport(); 
		$data = $this->validate($request, [
				'title'=>'required|max:90',
				'subtitle'=>'required|max:60',
				'fromdate'=>'required|date|before:todate',
				'todate'=>'required|date|after:fromdate',
				'city'=>'max:60',
				'country'=>'max:60',				
		]);
		$data['city'] = $request->input('city');	

		$fromDate = $request['fromdate'];
		$toDate = $request['todate'];
		$city = $request['city'];		
		$country = $request['country'];						

	   //generate the subsquery using an if-else statement based on the  user request inputs
		$filename = 'reports/clients/'.$request['title'].'.csv';
		if($city == Null ){
			//retrieve the query results from the database
		   $subsquery = Client::whereBetween('created_at', [$fromDate, $toDate])
						->latest()
						->get();

		}else if($city !== Null){
			//retrieve the query results from the database
		   $subsquery = Client::whereBetween('created_at', [$fromDate, $toDate])
							->where('city', $city)
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
			 $columns = array('Id','Name','Email','Phone','Address','Created At','Updated At');
			 fputcsv($fd, $columns);	
			 //loop through the query results to create a multidimensional array and write it to the file			 
			 foreach ($subsquery as $client) {			 
				$fdata = array(
					'Id' => $client->id,	
					'Name' => $client->name,					
					'Email' => $client->email, 
					'Phone' => $client->phone,					
					'Address' => $client->address,  
					'Created At' => $client->created_at, 
 					'Updated At' => $client->updated_at, 					
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
			$clientsReport->saveClientsReport($data);	
			
			$response = Response::json(['success' => ['message' => 'Report has been created successfully.','data' => $data,] ], 201); 
						
			return  $response;  
		
		}catch(Exception $e){
				
				$response = Response::json(['error' => ['message' => 'Report cannot be created, validation error!'] ], 422);
				
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
			$data['city']= $request['city'];
			$data['country']= $request['country'];		
			$data['subsquery']= $request['subsquery'];				
			$data['username']= $request['username'];
				
			/* This is database method of previewing a report
			if($data['city'] == Null ){
				 $clients = Client::whereBetween('created_at', [$data['fromdate'], $data['todate']])
									->latest()
									->get();
			}else if($data['city'] !== Null ){
				 $clients = Client::whereBetween('created_at', [$data['fromdate'], $data['todate']])
									->where('city', $data['city'])								
									->latest()
									->get();
			}
		  */
		 
		 //this is the file method of previewing a report
		 //generated file name
			$filename = 'reports/clients/'.$request['title'].'.csv';
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
								'email' => $value[2], 
								'phone' => $value[3],								
								'address' => $value[4],  
								'created_at' => $value[5], 
								'updated_at' => $value[6],								
						];	
						$outarray = $inarray;	
					}		
					$all_data = $outarray;
				};
				fclose($rfile);	
				unset($all_data[0]);
				//cast array into eloquent collection
				$clients = Client::hydrate($all_data);
				
				return view('reports.clients.preview',compact('clients','data'));			
			}else{
				return view('reports.clients.preview',compact('data'));			
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
		$city = $request['city'];
		$country = $request['country'];		
		$username = $request['username'];	

		$meta = [ // For displaying filters description on header
			 'From Date' =>  $fromDate,
			 'To Date' =>    $toDate
		];
	
		$result = AppDefaults::select(['companyName'])
							->first();
							
		$pagehead = $result['companyName'];
	

		//generate the query builder using an if-else statement based on the  user request inputs

		if($city == Null ){
		   $queryBuilder = Client::select(['id','name','email','phone','address','city','country','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
								->orderBy('created_at', 'DESC');

		}else if($city !== Null){
		   $queryBuilder = Client::select(['id','name','email','phone','address','city','country','created_at','updated_at'])
							->whereBetween('created_at', [$fromDate, $toDate])
							->where('city', $city)
							->orderBy('created_at', 'DESC');
		}
		
		$columns = [ // Set Column to be displayed
			'ID' => 'id',
			'Name' => 'name',			
			'Email' => 'email',
			'Phone' =>'phone',
			'Address' => 'address',			
			'City' => 'city',
			'Country' => 'country',			
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
						->editColumns(['ID', 'Email','City',], [ // Mass edit column
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
			$clientsReport = ClientsReport::findOrFail($id); //Find ClientsReport of id = $id
			$status = '200';
			return View('reports.clients.show',compact('clientsReport','status'));

			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'ClientsReport cannot be found.'] ], 404);
			
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
			$clientsReport = ClientsReport::findOrFail($id); //Find the first result where ClientsReport id = $id
			$status = '200';
			return View('reports.clients.edit',compact('clientsReport', 'status'));
			
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
		
			$clientsReport = new ClientsReport();
			$data = $this->validate($request, [
				'title'=>'required|max:90',
				'subtitle'=>'required|max:90',
				'fromdate'=>'required|date|before:todate',
				'todate'=>'required|date|after:fromdate',
				'city'=>'max:60',
				'country'=>'max:60',				
			]);
		    $data['id'] = $id;
			$data['subsquery']= $request['subsquery'];				
			$data['username']= $request['username'];
			
			$fromDate = $request['fromdate'];
			$toDate = $request['todate'];
			$city = $request['city'];		
						
						
	   //generate the subsquery using an if-else statement based on the  user request inputs
		$filename = 'reports/clients/'.$request['title'].'.csv';
		if($city == Null ){
			//retrieve the query results from the database
		   $subsquery = Client::whereBetween('created_at', [$fromDate, $toDate])
						->latest()
						->get();
		
		}else if($city !== Null){
			//retrieve the query results from the database
		   $subsquery = Client::whereBetween('created_at', [$fromDate, $toDate])
							->where('city', $city)
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
			 $columns = array('Id','Name','Email','Phone','Address','Created At','Updated At');
			 fputcsv($fd, $columns);	
			 //loop through the query results to create a multidimensional array and write it to the file			 
			 foreach ($subsquery as $client) {			 
				$fdata = array(
					'Id' => $client->id,	
					'Name' => $client->name,					
					'Email' => $client->email,
					'Phone' => $client->phone,					
					'Address' => $client->address,  
					'Created At' => $client->created_at, 
 					'Updated At' => $client->updated_at, 					
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
				$clientsReport->updateClientsReport($data);	
			
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
			$clientsReport = ClientsReport::findOrFail($id); //Find ClientsReport of id = $id
					if (Storage::disk('public')->exists($clientsReport->subsquery)) {					
							Storage::disk('public')->delete($clientsReport->subsquery);
					}			
			$clientsReport->delete();
			
			$response = Response::json(['success' => ['message' => 'Report  has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Report cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
 
 
}