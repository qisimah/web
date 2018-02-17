<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
	public static function store( $request )
	{
		$contact = new Contact();
		$contact->name		= $request->input('fullName');
		$contact->email		= $request->input('emailAdd');
		$contact->telephone	= $request->input('telephone');
		$contact->location	= $request->input('location');
		$contact->message	= $request->input('message');
		return $contact->saveOrFail();
	}
}
