<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;



class ContactsController extends Controller
{

    /**
     * Create a new controller instance.
     *
 
    * @return void
     */


    /**
     * Show the application dashboard.
     *

     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        return View('/contacts');
 
   }


    public function admin(){
	 return View('/admin');
  }
}
