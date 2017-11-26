<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

	public function login( Request $request )
	{
		$this->validate($request, [
			'userEmail' 	=> 'bail|required',
			'userPassword' 	=> 'bail|required|min:6'
		],[
			'userEmail.required'	=>	'Please enter a valid email address',
			'userPassword.required'	=>	'Please enter your password'
		]);

		$user = [
			'email' 	=> $request->userEmail,
			'password' 	=> $request->userPassword
		];

		$remember	= $request->remember;

		if (Auth::attempt($user, ($remember)? true : false)){
			return redirect($this->redirectTo);
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/login');
	}
}
