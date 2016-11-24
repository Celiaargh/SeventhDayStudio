<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;


class LoginController extends Controller
{
    //

    public function showLoginForm(){

    	//return \Hash::make(1);

    	return view('adminlogin');
    }

    public function processLogin(){

    	$input = \Request::only('username','password');

    	if(\Auth::attempt($input)==true){

    		return redirect('adminfront');
    	}else{
    		return redirect('login')->with('message','Try Again');
    	}
    }

    public function logout(){
    	\Auth::logout();

    	return redirect('login');
    }
}
