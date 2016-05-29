<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
* Home
*/
	Route::get('/', [
	'uses'=> '\Tutorbuddy\Http\Controllers\HomeController@index',
	'as'=> 'home'

	]);


//Authentication
Route::group(['middleware' => ['guest']], function () {
Route::get('/signup', [
	'uses'=> '\Tutorbuddy\Http\Controllers\AuthController@getSignup',
	'as'=> 'auth.signup'


	]);


Route::post('/signup', [
	'uses'=> '\Tutorbuddy\Http\Controllers\AuthController@postSignup'


	]);

    //sign in
Route::get('/signin', [
	'uses'=> '\Tutorbuddy\Http\Controllers\AuthController@getSignin',
	'as'=> 'auth.signin'


	]);

Route::post('/signin', [
	'uses'=> '\Tutorbuddy\Http\Controllers\AuthController@postSignin'
	]);
});



Route::get('/signout', [
	'uses'=> '\Tutorbuddy\Http\Controllers\AuthController@getSignout',
	'as'=> 'auth.signout'
	]);

/*
* Search
*/
Route::get('/search', [
	'uses'=>'\Tutorbuddy\Http\Controllers\SearchController@getResults',
	'as'=> 'search.results',
	]);
/*
* Profile
*/ 
Route::get('/user/{username}', [
	'uses'=>'\Tutorbuddy\Http\Controllers\ProfileController@getProfile',
	'as'=> 'profile.index',
	]);



Route::get('/profile/edit', [
	'uses'=>'\Tutorbuddy\Http\Controllers\ProfileController@getEdit',
	'as'=> 'profile.edit',
	'middleware'=> ['auth.basic'],
	]);


Route::post('/profile/edit', [
	'uses'=>'\Tutorbuddy\Http\Controllers\ProfileController@postEdit',
	'middleware'=> ['auth.basic'],
	
	]);


/*
*	Buddies
*/
Route::get('/buddies',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getIndex',
	'as'=> 'buddies.index',
	'middleware'=> ['auth.basic'],
	]);

Route::get('/buddies/add/{username}/{class}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getAdd',
	'as'=> 'buddies.add',
	'middleware'=> ['auth.basic'],
	]);

Route::get('/buddies/accept/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getAccept',
	'as'=> 'buddies.accept',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/buddies/decline/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getDecline',
	'as'=> 'buddies.decline',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/buddies/deletetutor/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getDeleteTutor',
	'as'=> 'buddies.deletetutor',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/buddies/deletetutee/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getDeleteTutee',
	'as'=> 'buddies.deletetutee',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/buddies/takebackrequest/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getTakeBackRequest',
	'as'=> 'buddies.takebackrequest',
	'middleware'=> ['auth.basic'],
	]);


/*
* 	handshake
*/
Route::get('/sendhandshake/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\HandshakeController@getSend',
	'as'=> 'handshake.send',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/accepthandshake/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\HandshakeController@getAccept',
	'as'=> 'handshake.accept',
	'middleware'=> ['auth.basic'],
	]);
Route::get('/denyhandshake/{username}/{class}/{time}',[
	'uses'=>'\Tutorbuddy\Http\Controllers\HandshakeController@getDecline',
	'as'=> 'handshake.decline',
	'middleware'=> ['auth.basic'],
	]);


/* 
* tutor registration
*/
Route::get('/register',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getRegister',
	'as'=> 'tutor.register',
	'middleware'=> ['auth.basic'],
	]); 
Route::post('/register',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@postRegister',
	'as'=> 'tutor.register',
	'middleware'=> ['auth.basic'],
	]);

/*
*    requesting tutors
*/
Route::get('/findtutors',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@getTutors',
	'as'=> 'tutor.get',
	'middleware'=> ['auth.basic'],
	]); 


/*
*   finding tutors
*/
Route::get('/findtutors/search',[
	'uses'=>'\Tutorbuddy\Http\Controllers\TutorController@findTutors',
	'as'=> 'tutor.find',
	'middleware'=> ['auth.basic'],
	]);



/*
*   about page
*/
Route::get('/home/about',[
	'uses'=>'\Tutorbuddy\Http\Controllers\HomeController@getAbout',
	'as'=> 'home.about',
	'middleware'=> ['auth.basic'],
	]);










