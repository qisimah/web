<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class UserController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$user = Auth::user()->toArray();
		return view('pages.index', compact('user'));
	}

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->img = $request->input('img', $user->img);
        return ($user->save())? ['status' => 'success', 'code' => 100, 'description' => 'Profile picture updated'] : ['status' => 'success', 'code' => 900, 'description' => 'Profile picture could not be updated at this time'];
	}

    /**
     * @param Request $request
     * @return string|static
     */
    public function authPusherSubscription(Request $request)
    {
        $options = [
            'cluster'   =>  'eu',
            'encrypted' =>  true,
            'curl_options' => [CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => false]
        ];

        $pusher = new Pusher('c4f320656ba2899c60c3', '70494a5a434228ab508a', '405750', $options);

        if ($request->channel_name === 'private-listening-channel'){
            if (Auth::user()->type === 'admin' && ( Auth::user()->role === 'master' || Auth::user()->role === 'seer' )){
                echo $pusher->socket_auth($request->channel_name, $request->socket_id);
            }
            return null;
        }

        if (explode('-', $request->channel_name)[1] === md5(Auth::id())){
            echo $pusher->socket_auth($request->channel_name, $request->socket_id);
            return null;
        }

        return Response::create('forbidden', 403);
	}

    public function logout()
    {
        Auth::logout();
        return $this->index();
	}
}
