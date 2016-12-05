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


Route::get('/', function(){
	return view('main');
});



Route::put('contents/{id}', function($id){

	$input = Request::all();
	$column = $input['column'];
    $value = $input['value']; //new data user enters 

    $user = App\Models\Content::find($id);
    $user->$column = $value;
    $user->save();

    return $value; //used to update the div
});





Route::get('adminfront', function(){

	$artist = App\Models\Artist::all();
	$faq = App\Models\Faq::all();

	return view('adminmain',['artists'=>$artist],['faqs'=>$faq]);
})->middleware('auth');

Route::get('newfaq',function(){

	return view('newfaq');
})->middleware('auth');

Route::get('newartist',function(){

	return view('newartist');
})->middleware('auth');

Route::get('users/{id}/edit',function($id){

	$user = App\Models\User::find($id);
	return view('editdetails',compact('user'));
})->middleware('auth');

//admin end

Route::get('test', function(){
	// $images = App\Models\Image::where('imageable_type','gallery')->get();

	// return $images;

	$artist = App\Models\Artist::find(1);

	return $artist->images;
});


Route::get('/',function(){

	$artist = App\Models\Artist::all();
	$faq = App\Models\Faq::all();

	return view('main',['artists'=>$artist],['faqs'=>$faq]);
});

Route::resource('users','UserController');
Route::resource('faq','FaqsController');
Route::resource('artist','ArtistController');


Route::get('login','LoginController@showLoginForm');
Route::post('login','LoginController@processLogin');
Route::get('logout','LoginController@logout');




//-------Contact us email

Route::post('/',function(){

	$data = Request::all();

	Mail::send('emailtemplate',$data,function($message) use ($data) {

		$message->from($data['email'],$data['firstname']);
		$message->to('testseventh@gmail.com')->subject('Hello');;
	});
});