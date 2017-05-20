<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
//		$this->middleware('auth');
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

    	$url = URL::to('/account/verify');
    	$token = base64_encode($request->input('email').Carbon::now());
		$admin['email'] 	= strtolower($request->input('email'));
		$admin['firstname'] = ucwords(strtolower($request->input('firstname')));
		$admin['lastname'] 	= ucwords(strtolower($request->input('lastname')));
		$admin['gender'] 	= $request->input('gender');
		$admin['type'] 		= $request->input('type');
		$admin['role'] 		= $request->input('role');
		$admin['verified']	= $token;
		$admin['password']	= bcrypt('qisimahaudio');
		$message = "Hi ".$admin['firstname'].", your Qisimah account have been created, please click the link below to complete the process.\n".$url.'/'.$token;

		if (Admin::create($admin) <> false){
			mail($admin['email'], 'VERIFY YOUR QISIMAH ACCOUNT', $message, 'Qisimah Audio Insights!');
			return redirect('/admin/create');
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
		if ($user = User::where('verified', $token)->first()){
			$user->verified = 'verified';
			$user->active = 2;
			if ($user->save()){
				Auth::attempt(['email' => $user->email, 'password' => 'qisimahaudio']);
				return $this->createPassword();
			}
		}
		return redirect()->to('/login');

    }

	public function createPassword()
	{
		return view('pages.createpassword');
    }

    public function updatePassword(Request $request){
		$this->middleware('auth');
		$user = Auth::user();
		$user->password = bcrypt($request->input('password'));
		$user->active 	= 1;
		if ($user->save()){
			return redirect('/');
		}
	}
}
