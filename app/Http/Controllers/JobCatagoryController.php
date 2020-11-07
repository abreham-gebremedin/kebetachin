<?php

namespace App\Http\Controllers;
use App\Models\JobCatagory;
use Illuminate\Http\Request;

class JobCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobcatagories= \App\Models\JobCatagory::orderBy('updated_at','desc')->get();// display with pagination
        return view('adminpanel.category.categories',compact(['jobcatagories']));
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
        $custommessage=["catagory_name.required"=>"you need to provide job category field"];
        $validatedData = $request->validate([
           'catagory_name' => 'required',
          
        ],$custommessage);
        $jobc = new \App\Models\JobCatagory();
        $jobc->fill($validatedData);
        $jobc->save();
     return redirect("categories")->with('success','Successfully inserted');
        
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
        $jobcatagory= \App\Models\JobCatagory::find($id);// display with pagination
        return view('adminpanel.category.edit',compact(['jobcatagory']));
  
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
         $jobcatagory= \App\Models\JobCatagory::find($id);// display with pagination
        $custommessage=["catagory_name.required"=>"you need to provide job category field"];
        $validatedData = $request->validate([
           'catagory_name' => 'required',
          
        ],$custommessage);
        $jobcatagory->fill($validatedData);
        $jobcatagory->save();
 
     return redirect("categories")->with('success','Successfully Updated');
 
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $jobc=JobCatagory::find($id);
          $jobc->delete();
      
        return redirect('categories')->with('success',"Successfuly Deleted");
    }
}
