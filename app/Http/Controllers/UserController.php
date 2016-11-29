<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Request as FormRequest;

use Validator;

use App\Models\User;

class UserController extends Controller
{
    public function __construct(){

          $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //
        return view('adminsignup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = FormRequest::all();
        $rules =[
            'username'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required',

        ];

        //validator

        $validator = Validator::make($input,$rules);  

        if($validator->passes() == true){

            $user = User::create($input);
            $user->password = bcrypt($user->password);
            $user->save();

            return redirect('adminfront');
        }else{
            return redirect('users/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('admindetails',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User('editdetails',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = FormRequest::all();

        if(FormRequest::ajax()==false){

            $rules = [
                'username'=>'required',
                'firstname'=>'required',
                'lastname'=>'required',

            ];

            $validator = Validator::make($input,$rules);

            if($validator = passes() == true){

                $user = User::find($id);

                $user->fill($input);

                $user->save();

                return redirect('details/'.$id);
            }else{

                return redirect('details/'.$id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
