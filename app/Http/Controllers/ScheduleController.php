<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


use Illuminate\Pagination\Paginator;
use Redirect, Response;
use App\Schedule;
use App\Room;

class ScheduleController extends Controller
{




   /**
     * Display a listing of the resource.
     *

     * @return \Illuminate\Http\Response
     */
 

   public function index()
    {
 
     
try{
        $schedule = Schedule::simplePaginate(10);
		$rooms = Room::All();
	
        
        return view('schedules.schedule.index',compact('schedule','rooms'));
 
}catch(Exception $e){

	$message = ['error' => ['message' => $e,'No content found.']];
        return view('schedules.schedule.index',compact('e'));
 
   }

 
}
   /**
     * Show the form for creating a new resource.
     *

     * @return \Illuminate\Http\Response
     */


    public function create()
    {

 
     try{ 
	$message =  ['url'=>'/schedule/create'];
		$rooms = Room::All();
	$response = Response::json($message);

        return view('schedules.schedule.create',compact('rooms'));   

    }catch(Exception $e){
       
	$message = ['error' => ['message' => $e,'No content found.']];
	$response = Response::json($message, 404);

        return $response;
 
 
	}	
 
   }

 



 

   /**
     * Store a newly created resource in storage.
     *
 
    * @param  \Illuminate\Http\Request  $request
 *
    * @return \Illuminate\Http\Response
     */
 

   public function store(Request $request)
    {

     
        $schedule = new Schedule();
        $data = $this->validate($request, [
	        'roomname'=>'required',
                'dos'=>'required',
                'fromtime'=>'required',
		'totime'=>'required',
		'purpose'=>'required',	
        ]);

     try{   
        $schedule->saveSchedule($data);
	$message = ['success' =>'New schedule record has been successfully created!','url' => '/schedule', 'data' => $data];
	$response = Response::json($message, 201);

        return $response;
  
   }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to created new record!']];
	$response = Response::json($message, 403);

        return $response;

    }

 
  }

 



 

   /**
     * Display the specified resource.
     *

     * @param  \App\Schedule  $Schedule
 *
    * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
 
     
        $schedule = Schedule::where('id', $id)
			->first();
	return view('schedules.schedule.show',compact('schedule',$id));  
    }

 

   /**
     * Show the form for editing the specified resource.
     *

     * @param  \App\Schedule  $Schedule
 *
    * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
 

    try{ 
        $schedule = Schedule::where('id', $id)
			->first();

    	
	$response = Response::json($schedule, 200);	
        
        return $response;
 
 

    }

catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No content found!']];
	$response = Response::json($message, 404);

        return $response;


    }


   }

    /**
     * Update the specified resource in storage.
     *

     * @param  \Illuminate\Http\Request  $request
 *
    * @param  \App\Schedule  $Schedule 
*
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
 
     
	try{ 
        $schedule = new Schedule();
        $data = $this->validate($request, [
	        'roomname'=>'required',
                'dos'=>'required',
                'fromtime'=>'required',
		'totime'=>'required',
		'purpose'=>'required',	
        ]);
        $data['id'] = $id;
	
        $schedule->updateSchedule($data);

       	$message = ['success' =>'Record has been successfully updated!', 'url' => '/schedule', 'data' => $data];
	$response = Response::json($message, 200);	
        
        return $response;
 


    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'Failed to update new record!']];
	$response = Response::json($message, 403);

        return $response;

    }

   }

 

   

 

   /**
     * Remove the specified resource from storage.
     *
 

    * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
 
      
	try{ 
        $schedule = Schedule::find($id);
        $schedule->delete();

        $message = ['success' =>'Record has been successfully deleted!', 'url' => '/schedule', 'id' => $id ];
	$response = Response::json($message, 200);	
        
        return $response;
 

    }catch(Exception $e){ 
	$message = ['error' => ['message' => $e,'No Record found!']];
	$response = Response::json($message, 404);

        return $response;

    }

   }
}
