<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;
use App\Models\ScreninigQuestion;
use Illuminate\Support\Facades\Auth;
use App\Models\HireManager;
 use App\Models\OtherSkill;
 use Hashids\Hashids;






class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hashids = new Hashids();

        $jobs=\App\Models\Job::orderBy('updated_at','desc')->paginate(10);// display with pagination
        return view('jobs.jobs',compact(['jobs','hashids']));

    }
    public function index2()
    {
        //
        $hashids = new Hashids();

        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
       
        $jobs=Job::where('hire_manager_id', $cleint->id)
        -> orderBy('name','asc')->paginate(10);// display with pagination
         return view('jobs.jobs',compact(['jobs','hashids']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1(Request $request)
    {

        $request->session()->forget('job');
        $request->session()->forget('sq');
        $request->session()->forget('skill_id');
         $jobscatlist=DB::table('job_catagory')
        ->get();
        $payment_type=DB::table('payment_type')->get(); 

        return view('jobs.step1',compact(['jobscatlist','payment_type']));
    }
    public function PostcreateJob1(Request $request)
    {
        $custommessage=["name.required"=>"you need to provide the name your job"];
         $validatedData = $request->validate([
            'name' => 'required',
            'number_of_frelance' => 'required',
            'job_catagory_id' => 'required',
            'payment_type_id' => 'required',
            'description' => 'required',
            'payment_amount' => 'required',
            'expected_duration_id' => 'required',
 


         ],$custommessage);
       $hm=HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
         if(empty($request->session()->get('job'))){
            $job = new \App\Models\job();
            $job->fill($validatedData);
            
            $job->hire_manager_id=$hm->id;
             
            $request->session()->put('job', $job);
        }else{
            $job = $request->session()->get('job');
            $job->fill($validatedData);
            $job->hire_manager_id=$hm->id;
           
            $request->session()->put('job', $job);
        }
              $request->session()->put('r', 'freelancer2');

              return redirect('/jobpost/next' );
         
    }



    public function create2(Request $request)
    {
        //
    
        $complexity=DB::table('complexity')
        ->get();
        $skill="";
        if(!empty($request->session()->get('job'))){
            # code...

            $job = $request->session()->get('job');
            $skill=DB::table('skill')->where("job_catid",$job->job_catagory_id)
            ->get();
             return view('jobs.step2',compact(['skill','complexity',]));


        } else {
            # code...
            // redirect(string)->route()
            
        }
 
    }
    public function PostcreateJob2(Request $request)
    {
       
        

         $validatedData = $request->validate([
            'main_skill_id' => 'required',
            'complexity_id' => 'nullable',

        ]);
          if(empty($request->session()->get('job'))){
            $job = new \App\Models\job();
            $job->fill($validatedData);
            $request->session()->put('skill_id', $request->skill_id);
            $request->session()->put('sq', $request->Sq);          
             $request->session()->put('job', $job);
        }else{
            $job = $request->session()->get('job');
            $job->fill($validatedData);
            $request->session()->put('skill_id', $request->skill_id);
            $request->session()->put('sq', $request->sq);  
            $request->session()->put('job', $job);
        }
        if(!empty($request->session()->get('skill_id'))&&!empty($request->session()->get('sq'))){
            $job = $request->session()->get('job');
            $job->save();
              $skill_id = $request->session()->get('skill_id');
             $sq = $request->session()->get('sq');
           

             foreach ($skill_id as $key => $otherskill_id) {
                # code...
                $otherskill = new \App\Models\OtherSkill();
                $otherskill->skill_id= $otherskill_id;
                $otherskill->job_id= $job->id;
                $otherskill->save();
              
    
            }

            foreach ($sq as $key => $q) {
                # code...
                $ScreninigQuestion = new \App\Models\ScreninigQuestion();
                
    
    
                $ScreninigQuestion->question= $q;
                $ScreninigQuestion->jobid= $job->id;
                $ScreninigQuestion->save();
              
    
            }

        } else {
            # code...
            // redirect(string)->route()
            $job = $request->session()->get('job');

            
        }
      
        $hashids = new Hashids();
        
        return redirect('/job-a-detail/'.$hashids->encode($job->id));


    
         
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
    
    public function showjobmanager($eid)
    {
        //
        $hashids = new Hashids();
        $id=$hashids->decode($eid);
        $job = \App\Models\job::find($id[0]);
         return view('jobs.jobviewmanager',compact(['job']));
    }
    public function showjobfreelancer($eid)
    {
        //
        $hashids = new Hashids();
        $jid=$hashids->decode($eid);
        $job = \App\Models\job::find($jid[0]);
        return view('jobs.jobviewfreelancer',compact(['job']));

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
    public function hmecategories()
    {     
        $hashids = new Hashids();
        $homejobcategory=\App\Models\JobCatagory::orderBy('updated_at','Asc')->paginate(10);// display with pagination
        return view('jobs.homejobcategory',compact(['homejobcategory','hashids']));


    }
}
