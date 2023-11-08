<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Booking;


class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$bookings = Booking::simplePaginate(15);//Get all Bookings

			return View('bookings.pages.index',compact('bookings',));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Bookings cannot be found.'] ], 404);
			
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
			return View('bookings.pages.create');
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
			$booking = new Booking();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|alpha_num|max:20',
				'status'=>'required',

			]);
		   
			$booking->saveBooking($data);
			
			$response = Response::json(['success' => ['message' => 'Booking has been created successfully.','data' => $booking,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Booking cannot be created, validation error!'] ], 422);
			
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
			$booking = Booking::findOrFail($id); //Find Booking of id = $id

			$response = Response::json($booking, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Booking cannot be found.'] ], 404);
			
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
			$booking = Booking::where('id', $id)->first(); //Find the first result where Booking id = $id
		
			return View('bookings.pages.edit',compact('booking',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Booking cannot be found.'] ], 404);
			
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
			$booking = new Booking();
			$data = $this->validate($request, [
				'dor'=>'required',
				'rtime'=>'required',
				'partySize'=>'required|max:3',
				'cName'=>'required|max:30',
				'cPhone'=>'required|alpha_num|max:20',
				'status'=>'required',
				'username'=>'required',
			]);
		    $data['id'] = $id;
			
			$booking->updateBooking($data);
			
			$response = Response::json(['success' => ['message' => 'Booking has been updated.','data' => $booking,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Booking cannot be updated, validation error!'] ], 422);
			
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
			$booking = Booking::findOrFail($id); //Find Booking of id = $id
			$booking->delete();
			
			$response = Response::json(['success' => ['message' => 'Booking has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Booking cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
