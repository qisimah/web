<?php

namespace App\Http\Controllers;

use App\Broadcaster;
use App\Listen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListenController extends Controller
{
    //

	public function user(){
		return $this->belongsToMany('App\User');
	}

	public function store(Request $request, Listen $listen){
		$count = count(Listen::where([
			['broadcaster_id', $request->input('broadcaster_id')],
			['user_id', Auth::id()]
		])->get());
		if ($count){
			return ['listen' => false];
		} else {
			$listen->broadcaster_id = $request->input('broadcaster_id');
			$listen->user_id = Auth::id();
			return ['listen' => $listen->save(), 'id' => $listen->id];
		}
	}

	public function destroy(Request $request, Listen $listen){
		$delete = $listen->where([
			['broadcaster_id',$request->input('broadcaster_id')],
			['user_id', Auth::id()]
		])->delete();
		if ($delete){
			return ['deleted' => true];
		} else {
			return ['deleted' => false];
		}
	}
}
