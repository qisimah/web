<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class AdminController extends Controller
{
    protected $rules;
    protected $messages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
	    //
	}

	public function index()
    {
        //
//		return Admin::all();
		return view('pages.createuser', ['user' => Auth::user()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('pages.createuser', ['user' => Auth::user()->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->middleware('auth');

    	$this->rules = [ // validation rules for user form
    	    'firstname' =>  'bail|required|min:2|max:30',
            'lastname'  =>  'bail|required|min:2|max:30',
            'role'      =>  'bail|required|in:user,seer,master,uploader',
            'type'      =>  'bail|required|in:artist,record-label,advertiser,ad-agency,admin',
            'gender'    =>  'bail|required|in:male,female',
            'email'     =>  'bail|required|email|unique:users,email'
        ];

    	$this->messages = [ // validation message for user form
    	    'firstname.required'    =>  'last name is required',
            'firstname.min'         =>  'last name must be at least two characters long',
            'firstname.max'         =>  'the maximun length of last name is 30',
            'lastname.required'     =>  'last name is required',
            'lastname.min'          =>  'last name must be at least two characters long',
            'lastname.max'          =>  'the maximun length of last name is 30'
        ];

    	$validator = Validator::make($request->all(), $this->rules, $this->messages); // validate the request

        if ($validator->fails()) { // if user form fails validation
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$admin = Admin::create([
		    'email' 	=> $request->input('email'),
            'firstname' => $request->input('firstname'),
            'lastname' 	=> $request->input('lastname'),
            'gender' 	=> $request->input('gender'),
            'type'		=> $request->input('type'),
            'role' 		=> $request->input('role'),
            'verified'	=> md5(uniqid(time(), true)),
            'password'	=> bcrypt('qisimahaudio')
        ]);

        if (is_null($admin)) { // if user creation fails
            $validator->errors()->add('failed', 'User could not be created at the moment. Please go take a shower and try again!');
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // send email invitation to the user
        Admin::sendInvite($admin['email'], $admin['firstname'], Admin::generateVerifyLink($admin['email'], $admin['verified']));
        Session::flash('success', 'User created successfully!');
        return redirect('admin/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	/**
	 * @param $token
	 * @return mixed
	 */
	public function verify($token)
	{
        $user = User::where('verified', $token)->first(); // fetch user with the token

        if (is_null($user)){ // if not user has the given verification token
            Session::flash('failed', 'Unknown verification token. If you have already verified your account, please click on the login button below!');
		} else {
            Auth::loginUsingId($user->id); // login using the found user's id
        }

        return redirect()->to('account/password/create');

    }

	public function createPassword()
	{
        $this->middleware('auth');
		return view('pages.createpassword');
    }

    public function newPassword(Request $request){
		$this->middleware('auth');

		$this->rules = [ // create password validation
		    'password'  =>  'bail|required|min:6',
            'confirm-password'  => 'bail|required|min:6|same:password'
        ];

		$validator = Validator::make($request->all(), $this->rules); // validation the request

        if ($validator->fails()) { // if request fails validation
            return redirect()->back()->withErrors($validator);
        }

		$user = Auth::user();
		$user->password = bcrypt($request->input('password')); // set new password
		$user->active 	= 1; // update active state
        $user->verified = 'verified';
		if ($user->save()){ // if the update was saved
            Auth::logout();
			return redirect()->to('welcome')->withInput(['email' => $user->email]);
		} else {
		    return redirect()->back();
        }
	}
}
