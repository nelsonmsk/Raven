<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use App\Order;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
			$orders = Order::simplePaginate(15);//Get all Orders

			$response = Response::json($orders, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Orders cannot be found.'] ], 404);
			
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
		return	$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
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
			$order = new Order();
			$data = $this->validate($request, [
				'items'=>'required|max:120',
				'subTotal'=>'required|max:12',
				'sRequest'=>'required|max:50',
				'cName'=>'required|max:30',
				'cPhone'=>'required|max:15',
				'cAddress'=>'required|max:50',
				'username'=>'required|max:30',
			]);
		   
			$order->saveOrder($data);
			
			$response = Response::json(['success' => ['message' => 'Order has been created successfully.','data' => $order,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Order cannot be created, validation error!'] ], 422);
			
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
			$order = Order::findOrFail($id); //Find Order of id = $id

			$response = Response::json($order, 200);

			return	$response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
			
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
			$order = Order::where('id', $id)->first(); //Find the first result where Order id = $id
		
			$response = Response::json($order, 200);
			
			return $response;
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
			
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
			$order = new Order();
			$data = $this->validate($request, [
				'items'=>'required|max:120',
				'subTotal'=>'required|max:12',
				'sRequest'=>'required|max:50',
				'cName'=>'required|max:30',
				'cPhone'=>'required|max:15',
				'cAddress'=>'required|max:50',
				'username'=>'required|max:30',
			]);
		    $data['id'] = $id;
			
			$order->updateOrder($data);
			
			$response = Response::json(['success' => ['message' => 'Order has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Order cannot be updated, validation error!'] ], 422);
			
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
			$order = Order::findOrFail($id); //Find Order of id = $id
			$order->delete();
			
			$response = Response::json(['success' => ['message' => 'Order has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Order cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }
}
