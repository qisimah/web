<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/login', function () {
    return 'something';
});
Auth::routes();
Route::get('/', 'UserController@index');
Route::get('/welcome', function () {
	return view('Qisimah-Landing.index');
})->name('welcome');
Route::get('/file/create/{type}', 'FileController@create');
Route::post('/file/create/{type}', function ($type, Request $request){
    return FileController::store($type, $request);
});
Route::resource('file', 'FileController');
Route::get('/play/today', 'PlayController@playsToday');
Route::get('/play/broadcaster', 'PlayController@playsOfBroadcaster');
Route::get('/play/broadcaster/{stream_id}/{date}', 'PlayController@getPlaysOfBroadcaster');
Route::get('/play/content', 'PlayController@playsOfContent');
Route::get('/play/content/{detection_id}/{date}', 'PlayController@getPlaysOfContent');
Route::get('/play/{day}', 'PlayController@getPlays');
Route::get('/admin/create', 'AdminController@create');
Route::get('/account/verify/{token}', 'AdminController@verify');
Route::get('/account/password/create', 'AdminController@createPassword');
Route::post('/account/password/create', 'AdminController@updatePassword');
Route::resource('play', 'PlayController');
Route::get('/broadcaster/select', 'BroadcasterController@select');
Route::resource('broadcaster', 'BroadcasterController');
Route::resource('share', 'ShareController');
Route::resource('subscribe', 'SubscribeController');
Route::resource('pay', 'PayController');
Route::resource('admin', 'AdminController');
Route::resource('artist', 'ArtistController');
Route::get('/home', 'HomeController@index');
Route::post('/listen', 'ListenController@store');
Route::post('/listen/delete', 'ListenController@destroy');
Route::post('/detection', 'DetectionController@store');
Route::resource('contact', 'ContactController');
Route::resource('producer', 'ProducerController');

// Genres
Route::get('/genre', 'GenreController@index');
Route::post('/genre/create', 'GenreController@store');

// Artists
//Route::get('/artist', 'ArtistController@index');
//Route::post('/artist/create', 'ArtistController@store');
