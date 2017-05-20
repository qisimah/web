<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class BroadcasterController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$stations = Auth::user()->listening()->get()->toArray();
    	$listening = [];
    	foreach ($stations as $station){
    		array_push($listening, $station['pivot']['broadcaster_id']);
		}
//		return [$listening, 'broadcasters' => Broadcaster::whereNotIn('id', $listening)->get()->toArray()];
        return view('pages.broadcaster', ['user' => Auth::user()->toArray(), 'listening' => $stations, 'listen' => Broadcaster::whereNotIn('id', $listening)->get()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createbroadcaster', ['user' => Auth::user()->toArray()]);
    }

	public function select()
	{
		return view('pages.selectbroadcaster', ['user' => Auth::user()->toArray()]);
    }

    protected function validator(array $data)
	{
		return Validator::make($data, [
			'name'		=>	'bail|required|min:3|max:20',
			'frequency'	=>	'bail|required|min:4|max:5',
			'country'	=> 	'bail|required|min:4|max:20',
			'city'		=>	'bail|required|min:2|max:20',
			'tags'		=> 	'bail|required|min:4'
		]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$caster = new Broadcaster();
		$caster->name = $request->input('name');
		$caster->frequency = $request->input('frequency');
		$caster->tagline = $request->input('tagline');
		$caster->reach = $request->input('reach');
		$caster->country = $request->input('country');
		$caster->city = $request->input('city');
		$caster->address = $request->input('address');
		$caster->phone = $request->input('phone');
		$caster->tags = $request->input('tags');
		$caster->stream_id = $request->input('stream_id');
		$caster->user_id = Auth::id();
		$caster->img = '/images/logo/logo-sm-dark.png';
		if ($request->hasFile('img')){
			$data['artist'] = $request->input('name');
			$data['title'] = $request->input('frequency');
			$data['featured'] = '';
			$fileController = new FileController();
			$img = $fileController->prepareFile($request->file('img'), $data, 'image', 5000000);
			if (typeOf($img) <> 'array'){
				$caster->img = $img;
			}
		}
		if ($caster->save()){
			return redirect('/broadcaster');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Broadcaster  $broadcaster
     * @return \Illuminate\Http\Response
     */
    public function show(Broadcaster $broadcaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Broadcaster  $broadcaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Broadcaster $broadcaster)
    {
        //
		return view('pages.updatebroadcaster', ['broadcaster' => $broadcaster, 'user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Broadcaster  $broadcaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broadcaster $broadcaster)
    {
		$broadcaster->name 		= $request->input('name');
		$broadcaster->frequency = $request->input('frequency');
		$broadcaster->tagline 	= $request->input('tagline');
		$broadcaster->reach 	= $request->input('reach');
		$broadcaster->country 	= $request->input('country');
		$broadcaster->city 		= $request->input('city');
		$broadcaster->address 	= $request->input('address');
		$broadcaster->phone 	= $request->input('phone');
		$broadcaster->stream_id = $request->input('stream_id');
		$broadcaster->tags		= $request->input('tags');

		if ($request->hasFile('img')){
			$file = new FileController();
			$data['artist'] = $request->input('name');
			$data['title'] = $request->input('frequency');
			$data['featured'] = '';
			$broadcaster->img 	= $file->prepareFile($request->file('img'), $data, 'image', 5000000);
		}

		if ($broadcaster->saveOrFail()){
			return redirect('/broadcaster');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Broadcaster  $broadcaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadcaster $broadcaster)
    {
        //
		$user = Auth::user()->toArray();
		if ($user['type'] === 'admin'){
			return ['delete' => $broadcaster->delete()];
		}
    }
}
