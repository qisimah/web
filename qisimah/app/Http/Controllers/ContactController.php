<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return Contact::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created contact message in the contacts table in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$this->validate($request, [
			'fullName'	=>	'bail|required|min:6|max:150',
			'emailAdd'	=>	'bail|required|min:6|max:100',
			'telephone'	=>	'bail|required|min:6|max:15',
			'message' 	=> 	'bail|required|min:20'
		], [
			'fullName.required'		=>	'Please enter your name',
			'emailAdd.required'		=>  'Please enter a valid email address',
			'telephone.required'	=>	'Please enter phone number in international format',
			'message.required'		=> 	'Please enter your message'
		]);

		if (Contact::store($request)){
			return [
				'code'	=>	100,
				'description'	=>	'Thank you for reaching out, we\'ll get back to you shortly.'
			];
		} else {
			return [
				'code'	=>	900,
				'description'	=>	'Sorry, your message could not be sent at this time, please try again later.'
			];
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
		return Contact::find($id)->first();
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
		return Contact::find($id)->delete();
    }
}
