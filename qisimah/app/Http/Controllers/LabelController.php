<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LabelController extends Controller
{
	protected $rules;
	protected $messages;

	public function __construct()
	{
		$this->middleware('auth');
		$this->rules = [
			'label-name'	=>	'bail|required|unique:labels,name|max:50'
		];

		$this->messages = [
			'label-name.required'	=>	'Label name is required',
			'label-name.unique'		=>	'Label name already exist, try something different or contact support!'
		];
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$labels = Label::orderBy('name')->paginate(20);
		return view('pages.labels.index', compact('user', 'labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$user = Auth::user();
        return view('pages.labels.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), $this->rules, $this->messages);

		if ($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		} else {
			$label = Label::create([
				'name'			=>	$request->input('label-name'),
				'created_by'	=>	Auth::id(),
				'updated_by'	=>	Auth::id()
			]);

			if ($label->exists()) {
				Session::flash('success', $label->name. ' added successfully!');
				return redirect()->to(route('labels.index'));
			} else {
				$validator->errors()->add('failed', 'Label could not be saved at this time, please try again later!');
				return redirect()->back()->withErrors($validator)->withInput();
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

	/**
	 * Show specified resource for edit.
	 * @param Label $label
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Label $label)
    {
        $user = Auth::user();
        return view('pages.labels.edit', compact('user', 'label'));
    }

	/**
	 * @param Request $request
	 * @param Label $label
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, Label $label)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
        	return redirect()->back()->withInput()->withErrors($validator);
		} else {
        	$label->name = $request->input('label-name');
        	$label->updated_by = Auth::id();

        	if ($label->save()) {
        		Session::flash('success', $label->name. ' updated successfully!');
        		return redirect()->to('labels');
			}

			$validator->errors()->add('error', $label->name .' could not be updated at this time, please try again later or contact support!');
        	return redirect()->back()->withErrors($validator)->withInput();
		}
    }

	/**
	 * @param Label $label
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Label $label)
    {
        if ($label->exists()) {
        	if ($label->created_by === Auth::id()){
        		$isDeleted = $label->delete();
			} elseif (in_array(Auth::user()->role, ['master', 'seer'])) {
        		$isDeleted = $label->delete();
			}

			if ($isDeleted) {
				Session::flash('success', 'Label deleted!');
			} else {
        		Session::flash('error', 'Label could not deleted, you may not have permissions to perform this task');
			}

		} else {
        	Session::flash('error', 'The specified label is not available');
		}
		return redirect()->to('labels');
    }
}
