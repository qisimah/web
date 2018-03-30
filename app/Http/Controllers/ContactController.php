<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        //
		return Contact::all();
    }


    /**
     *
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name'	=>	'bail|required|min:6|max:150',
			'email'	=>	'bail|required|min:6|max:100',
			'telephone'	=>	'bail|required|min:6|max:15',
			'user_type' 	=> 	'bail|required'
		], [
			'name.required'		=>	'Please enter your name',
			'email.required'		=>  'Please enter a valid email address',
			'telephone.required'	=>	'Please enter phone number in international format',
			'user_type.required'		=> 	'Please select user type'
		]);

		return redirect()->to('contact.us#contact-form')->with('success', Contact::store($request));
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
