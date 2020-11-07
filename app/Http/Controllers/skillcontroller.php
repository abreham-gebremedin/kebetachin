<?php

namespace App\Http\Controllers;
use App\Models\Skill;

use Illuminate\Http\Request;

class skillcontroller extends Controller
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
  
        $skills= \App\Models\Skill::orderBy('updated_at','desc')->get();// display with pagination
        return view('adminpanel.skill.skills',compact(['skills','jobcatagories']));
  
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
        $custommessage=["job_catid.required"=>"you need to provide job category field",
        "skill_name.required"=>"you need to provide Skill field"];
        $validatedData = $request->validate([
           'job_catid' => 'required',
           'skill_name' => 'required|unique:skill',
           

          
        ],$custommessage);
        $sk = new \App\Models\Skill();
        $sk->fill($validatedData);
        $sk->save();
     return redirect("skills")->with('success','Successfully inserted');

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
        $jobcatagories= \App\Models\JobCatagory::orderBy('updated_at','desc')->get();// display with pagination 
        $skill= \App\Models\Skill::find($id);// display with pagination
        return view('adminpanel.skill.edit',compact(['skill','jobcatagories']));
  
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
        $sk= \App\Models\skill::find($id);// display with pagination
        $custommessage=["job_catid.required"=>"you need to provide job category field",
        "skill_name.required"=>"you need to provide Skill field"];
        $validatedData = $request->validate([
           'job_catid' => 'required',
           'skill_name' => 'required',
           

          
        ],$custommessage);
         $sk->fill($validatedData);
        $sk->save();
     return redirect("skills")->with('success','skill Successfully updated');
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
         //
         $jobc=skill::find($id);
         $jobc->delete();
     
       return redirect('skills')->with('success',"Successfuly Deleted");

    }
}
