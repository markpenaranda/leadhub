<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/flush', function(){
  Session::flush();
});
Route::controller('login', 'LoginController');
Route::controller('tweet', 'TwitterController');
Route::controller('project', 'ProjectController');
Route::controller('profile', 'ProfileController');
Route::get('/logout', function(){
    Session::flush();
    return Redirect::to('/');
});
// Route::get('/{name}', array('uses'=>'ProfileController@getIndex'));
Route::get('/{name}', function($name){
  if (isset($name)){
    
  }
  else{
     Redirect::to('/');
  }
});
Route::controller('/', 'HomeController');