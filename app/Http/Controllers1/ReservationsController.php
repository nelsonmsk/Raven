<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Reservation;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$reservations = Reservation::simplePaginate(15);//Get all Reservations

			$response = Response::json($reservations, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Reservations cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'Reservation cannot be found.'] ], 404);
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
			$reservation = new Reservation();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|max:15',
				'status'=>'required',
				'username'=>'required|max:30',
			]);
		   
			$reservation->saveReservation($data);
			
			$response = Response::json(['success' => ['message' => 'Reservation has been created successfully.','data' => $reservation,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Reservation cannot be created, validation error!'] ], 422);
			
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
			$reservation = Reservation::findOrFail($id); //Find Reservation of id = $id

			$response = Response::json($reservation, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Reservation cannot be found.'] ], 404);
			
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
			$reservation = Reservation::where('id', $id)->first(); //Find the first result where Reservation id = $id
		
			$response = Response::json($reservation, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Reservation cannot be found.'] ], 404);
			
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
			$reservation = new Reservation();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|max:15',
				'status'=>'required',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$reservation->updateReservation($data);
			
			$response = Response::json(['success' => ['message' => 'Reservation has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Reservation cannot be updated, validation error!'] ], 422);
			
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
			$reservation = Reservation::findOrFail($id); //Find Reservation of id = $id
			$reservation->delete();
			
			$response = Response::json(['success' => ['message' => 'Reservation has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Reservation cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
