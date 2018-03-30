<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

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
	    $rules = [
            'email' 	=> 'bail|required|exists:users,email',
            'password' 	=> 'bail|required|min:6'
        ];

	    $messages = [
            'email.required'	=>	'Please enter a valid email address',
            'password.required'	=>	'Please enter your password'
        ];

	    $validator = Validator::make($request->all(), $rules, $messages);

	    if ($validator->fails()) {
	        return back()->withErrors($validator)->withInput();
        } else {
            $user = [
                'email' 	=> $request->email,
                'password' 	=> $request->password
            ];

            $remember	= $request->input('remember', false);

            if (Auth::attempt($user, $remember)){
                return redirect($this->redirectTo);
            } else {
                $validator->errors()->add('user', 'Credentials mismatch!');
                return back()->withInput()->withErrors($validator);
            }
        }
	}

	public function logout()
	{
		Auth::logout();
		return redirect('/log.in');
	}
}
