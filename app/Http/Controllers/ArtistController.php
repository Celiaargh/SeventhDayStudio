<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Request as FormRequest;

use Validator;
use App\Models\Artist;

class ArtistController extends Controller
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
            'name'=>'required',
            'description'=>'required',
        ];

        $validator = Validator::make($input,$rules);

         if($validator->passes() == true){
        
            $artist = Artist::create($input);


            $newName = 'artist_'.$artist->id.'.jpg';

            \Request::file('artist_photo')->move('images',$newName);

            $artist->artist_photo = $newName;
            $artist->save();


            return redirect('adminfront');
        }else{
            return redirect('newartist')->withInput()->withErrors($validator);
        };

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
        $artist = Artist::find($id);
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

        $input = \Request::all();
        $column = $input['column'];
        $value = $input['value']; //new data user enters 

        $artist = Artist::find($id);
        $artist->$column = $value;
        $artist->save();

        return $value; //used to update the div
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
        $artist = Artist::find($id);
        $artist->delete();
        return redirect('adminfront');

    }
}
