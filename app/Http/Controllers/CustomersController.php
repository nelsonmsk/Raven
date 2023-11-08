<?php


namespace App\Http\Controllers;


use App\Http\Requests\CustomerRequest;

use App\Http\Requests\PasswordRequest;
use Response;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Customer;


class CustomersController extends Controller
{
 
   /**
     * Show the form for editing the customer.
     *
 
    * @return \Illuminate\View\View
     */
  
  public function index()
    {
      try{		
			$customers= Customer::simplePaginate(15); //Get all customers
	
			return view('customers.pages.index',compact('customers',200));
			
	  	}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Customers cannot be found.'] ], 404);
			
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
			return View('customers.pages.create');
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
			$customer = new Customer();
			$data = $this->validate($request, [
				'name'=>'required|max:50',			
				'email'=>'required|max:50',
				'phone'=>'required|max:30',		
				'address'=>'max:90',			
			]);
		   
			$customer->saveCustomer($data);
			
			$response = Response::json(['success' => ['message' => 'Customer has been created successfully.','data' => $customer,] ], 201); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Customer cannot be created, validation error!'] ], 422);
			
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
			$customer = Customer::where('id', $id)->first(); //Find the first result where Customer id = $id
		
			return View('customers.pages.edit',compact('customer',200));
			
		}catch(Exception $e){

			$response = Response::json(['error' => ['message' => 'Customer cannot be found.'] ], 404);
			
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
			$customer = new Customer();
			$data = $this->validate($request, [
				'name'=>'required|max:50',			
				'email'=>'required|max:50',
				'phone'=>'required|max:30',			
				'address'=>'max:90',
				'username'=>'required',				
			]);
			
		    $data['id'] = $id;
			
			$customer->updateCustomer($data);
			
			$response = Response::json(['success' => ['message' => 'Customer has been updated.','data' => $data,] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Customer cannot be updated, validation error!'] ], 422);
			
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
			$customer = Customer::findOrFail($id); //Find Customer of id = $id			
			$customer->delete();
			
			$response = Response::json(['success' => ['message' => 'Customer has been deleted.'] ], 200); 
				
			return  $response;	
			
		}catch(Exception $e){
			
			$response = Response::json(['error' => ['message' => 'Customer cannot be found.'] ], 404);
			
			return 	$response;		
		}			
    }

}
