<?php

namespace App\Http\Controllers;
use App\Models\ExpectedDuration;

use Illuminate\Http\Request;

class expectedeurationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expecteddurations= \App\Models\ExpectedDuration::orderBy('updated_at','desc')->get();// display with pagination
        return view('adminpanel.expectedduration.expecteddurations',compact(['expecteddurations']));
 
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
        $custommessage=["duration_text.required"=>"you need to provide duration field"];
        $validatedData = $request->validate([
           'duration_text' => 'required',
          
        ],$custommessage);
        $jobc = new \App\Models\ExpectedDuration();
        $jobc->fill($validatedData);
        $jobc->save();
     return redirect("expecteddurations")->with('success','Successfully inserted');
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
        $jobc=ExpectedDuration::find($id);
        $jobc->delete();
    
      return redirect('expecteddurations')->with('success',"Successfuly Deleted");

    }
}
