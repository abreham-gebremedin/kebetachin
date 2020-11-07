<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createStep1(Request $request)
    {
        $location = $request->session()->get('location');

        return view('company.step1',compact('location'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',

        ]);
        if(empty($request->session()->get('location'))){
            $location = new \App\Models\Location();
            $location->fill($validatedData);
            $request->session()->put('location', $location);
        }else{
            $location = $request->session()->get('location');
            $location->fill($validatedData);
            $request->session()->put('location', $location);
           
        }
        return redirect($request->session()->get('r'));
    }

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
    }
}
