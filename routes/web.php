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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Pusher
Route::post('/pusher/auth', 'UserController@authPusherSubscription');

Route::post('/user/{id}/update', 'UserController@update');
Auth::routes();
Route::get('/', 'UserController@index');
Route::get('/welcome', function () {
	return view('Qisimah-Landing.index');
})->name('welcome');
Route::get('/file/create/{type}', 'FileController@create');
Route::get('/file/{id}/details', 'FileController@details');
Route::post('/file/create/{type}', function ($type, Request $request){
    return FileController::store($type, $request);
});

Route::get('play/region/coordinates/{country_id}/{file_id}', 'RegionController@index');
Route::resource('file', 'FileController');
Route::get('/country/region/{country_id}', 'CountryController@countryRegions');
Route::resource('country', 'CountryController');
Route::get('/tag', 'TagController@index');
Route::get('/play/today', 'PlayController@playsToday');
Route::get('/play/count/today', 'PlayController@getTodayPlayCount');
Route::get('/updates', 'PlayController@getRealTimeUpdates');
Route::get('/play/broadcaster', 'PlayController@playsOfBroadcaster');
Route::get('/play/broadcaster/{stream_id}/{start}/{end}', 'PlayController@getBroadcasterPlays');
Route::get('/play/content', 'PlayController@playsOfContent');
Route::get('/play/artist/{id?}', 'PlayController@getArtistSongs');
Route::get('/play/content/{id}/{start}/{end}', 'PlayController@getContentPlays');
Route::get('/play/{start}/{end}', 'PlayController@getPlays');
Route::get('/admin/create', 'AdminController@create');
Route::get('/account/verify/{token}', 'AdminController@verify');
Route::get('/account/password/create', 'AdminController@createPassword');
Route::post('/account/password/create', 'AdminController@updatePassword');
Route::post('/detection', 'PlayController@store');
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
Route::resource('contact', 'ContactController');
Route::get('/producer/{id}', 'ProducerController@show');
Route::resource('producer', 'ProducerController');

// Genres
Route::get('/genre', 'GenreController@index');
Route::get('/genre/{id}', 'GenreController@show');
Route::post('/genre/create', 'GenreController@store');
