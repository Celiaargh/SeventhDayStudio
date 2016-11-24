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
    return view('welcome');
});

Route::get('front', function(){
	return view('main');
});

Route::get('adminfront', function(){

	$artist = App\Models\Artist::all();
	$faq = App\Models\Faq::all();

	return view('adminmain',['artists'=>$artist],['faqs'=>$faq]);
});



Route::get('test', function(){
	// $images = App\Models\Image::where('imageable_type','gallery')->get();

	// return $images;

	$artist = App\Models\Artist::find(1);

	return $artist->images;
});


Route::get('front',function(){

	$artist = App\Models\Artist::all();
	$faq = App\Models\Faq::all();

	return view('main',['artists'=>$artist],['faqs'=>$faq]);
});



Route::resource('users','UserController');
Route::get('login','LoginController@showLoginForm');
Route::post('login','LoginController@processLogin');
Route::get('logout','LoginController@logout');




//-------Contact us email

// Route::post('front',function(){

// 	$data = Request::all();

// 	Mail::send('emailtemplate',$data,function($message){

// 		$message->from('','system');
// 		$message->to('');
// 	});
// });