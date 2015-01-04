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

//	HOME PAGE ROUTE
//Route::get('/', function(){
// Route::any('/',function(){	
// 	//return View::make('hello');
// 	return View::make('pages.home');
// });


Route::any('/', array(
	"as" => "home",
	function(){
		return View::make('pages.home');
	}	
));


// Route::any('admin',function(){
// 	return View::make('hello');
// });






// Catch-all URL is last | Not Found Page
Route::any('/{page?}',function(){
	return View::make('pages.404');
})->where('page','.*');

