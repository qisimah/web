<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('pages.genre-index', ['user' => Auth::user(), 'genres' => Genre::latest('created_at', 'desc')->get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:4|max:30|unique:genres'
        ]);
        Genre::store($request);
        return redirect('/genre');
    }

    public function show($id)
    {
        if ($id === 'all'){
            $_genres = collect();
            Genre::orderBy('name')->chunk(500, function ($genres) use ($_genres){
                foreach ($genres as $genre) {
                    $_genres->push($genre);
                }
            });
            return $_genres;
        }

        return Genre::find($id);

    }

    public function update(Genre $genre, Request $request)
    {

    }

    public function destroy(Genre $genre)
    {

    }
}
