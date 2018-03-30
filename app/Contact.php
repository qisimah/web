<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
	public static function store( $request )
	{
		$contact = new Contact();
		$contact->name		= $request->name;
		$contact->email		= $request->email;
		$contact->telephone	= $request->telephone;
		$contact->location	= $request->user_type;
		return $contact->saveOrFail();
	}
}
