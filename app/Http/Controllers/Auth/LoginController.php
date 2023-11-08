<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Response;
use Validator;
use Illuminate\Http\RedirectResponse;

use App\Models\AppDefaults;
use App\Models\User;


class LoginController extends Controller
{

   /*
    |--------   | Login Controller
    |-----   |
 *
   | This controller handles authenticating users for the application and
 |
    | redirecting them to your home screen. The controller uses a trait
 |
 | to conveniently provide its functionality to your applications.
    |
    */

	public function getLogin()
	{
					  
		$appDefaults = AppDefaults::latest()->first();
		$rtemplate = ['appDefaults' => $appDefaults,];
		$status = '200';
		return view('auth.login',compact('rtemplate','status'));
	}



	public function postLogin(Request $request)
	{
		
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);		
		
		if ($validator->fails()) {
			
				$response = Response::json(['errors' => $validator->messages()->all() ], 202);	
			
		} else {
			$remember = $request->remember? true : false;
			$email = $request->email;
			
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
				
				
			  $this->guard()->login(auth()->user(),$remember);

			  $response = Response::json(['success' => ['message' => 'Login Successful!', 'url' => 'dashboard','username'=>$this->guard()->user()->name,'userno'=>$this->guard()->user()->id,] ], 200);	
			
		
			} else {
				
				$response = Response::json(['error' => ['message' => 'Please check your email or password again.'] ], 202);	
				 
			}
		}

		return $response;
	}
	
	
	    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }
	
	 /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
       $this->guard()->logout();
		
         $request->session()->invalidate();
		
		$response = Response::json(['success' => ['message' => 'LogOut Successful!   Please login to continue...', 'url' => '/',] ], 200);	
		
		return $response;
        /** return redirect('/'); */
    }	 
	
	 /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
	
}
