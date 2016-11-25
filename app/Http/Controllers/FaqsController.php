<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Request as FormRequest;

use Validator;
use App\Models\Faq;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

          $this->middleware('auth');

    }

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
        return view('newfaq');
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

        $rules = [
            'question'=>'required',
            'answer'=>'required',
        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes() ==true){
            $faq = Faq::create($input);
            $faq->save();

            return redirect('adminfront');
        }else{
            return redirect('newfaq');
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
        $faq = Faq::find($id);
        return view('adminfront');
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

        $rules = [

            'question'=>'required',
            'answer'=>'required',
        ];

        $validator = Validator::make($input,$rules);

        if($validator->passes()==true){

            $faq = Faq::find($id);

            $faq->fill($input);

            $faq->save();

           return redirect('adminfront');
        }else{
            return redirect('newfaq')->withInput()->withErrors($validator);
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
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('adminfront');

    }
}
