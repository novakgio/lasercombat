<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::post('/register','RegistrationController@store');


Route::post('login','LoginController@checkLogin');

Route::get('/login',function(){

	

});
Route::get('/logout','RegistrationController@logout')->name('logout');