<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Freelancer;
use App\Models\PaymentType;
use App\Models\HasSkill;
use App\Models\Education;
use App\Models\Location;
use App\Models\frelance_job_catagory;


class FreelancerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function reghome()
    {
        return view('home');

    }
    public function useragreement()
    {
        return view('useragreement');

    }
    public function index(Request $request)
    {
        $request->session()->forget('location');
        $request->session()->forget('freelancer');
       $freelancer=Freelancer::where('userid',Auth::user()->id)->firstOrFail();
        $payment_type=PaymentType::where('id',$freelancer->payment_type_id)->firstOrFail()(); 
       $jobscat1=frelance_job_catagory::where('fid',$freelancer->id)->get(); 
       $jobscat=[] ;
       foreach ($jobscat1 as $key => $jc) {
        # code...
         array_push($jobscat,$jc->jcid);
         }


       $skills=HasSkill::where('freelancer_id',$freelancer->id)->get(); 
       $skill=array();
       foreach ($skills as $key => $skl) {
        # code...
        array_push($skill,$skl->skill_id);
         }
       $education=Education::where('freelancer_id',$freelancer->id)->get(); 
       $location=Location::where('id',$freelancer->lid)->firstOrFail(); 
       
       $jobscatlist=DB::table('job_catagory')
       ->whereIn('id', $jobscat)
       ->get();
        $cer=DB::table('education')
       ->whereIn('id', $education)
       ->get();
       
       $skillslist=DB::table('skill')
       ->whereIn('id', $skill)
       ->get();

           
         return view('freelancers.index',compact(['payment_type','freelancer','location','jobscatlist','cer','skillslist']));
     }

  
    public function createStep1(Request $request)
    {
        $freelancer = $request->session()->get('freelancer');

        return view('freelancers.create1',compact('freelancer'));
    }

    public function attributes()
    {
        return [
            'proname' => 'email address',
        ];
    }
    public function PostcreateStep1(Request $request)
    {
        $request['userid']=Auth::user()->id;
          
         $validatedData = $request->validate([
            'proname' => 'required',
            'overview' => 'required',
            'userid' => 'unique:freelancer'

         ],$this->attributes());
           if(empty($request->session()->get('freelancer'))){
            $freelancer = new \App\Models\Freelancer();
            $freelancer->fill($validatedData);
              
            $request->session()->put('freelancer', $freelancer);
        }else{
            $freelancer = $request->session()->get('freelancer');
            $freelancer->fill($validatedData);
 
            $request->session()->put('freelancer', $freelancer);
        }
              $request->session()->put('r', 'freelancer2');

              return redirect('/location1' );
         
    }

    public function createStep2(Request $request)
    {
        $freelancer = $request->session()->get('freelancer');
        $jc=DB::table('job_catagory')
         ->get();
 
        return view('freelancers.create3',compact(['freelancer','jc']));

     }

    public function PostcreateStep2(Request $request)
    {
         $validatedData = $request->validate([
            'jobscat' => 'required',
            'payment_type_id' => 'required',
        ]);
        if(empty($request->session()->get('freelancer'))){
            $freelancer = new \App\Models\Freelancer();
            $freelancer->fill($validatedData->payment_type_id);
            $request->session()->put('jobscat', $request->jobscat);
           
            $request->session()->put('freelancer', $freelancer);
        }else{
            $freelancer = $request->session()->get('freelancer');
            $freelancer->payment_type_id=$request->payment_type_id;
            $request->session()->put('freelancer', $freelancer);
            $request->session()->put('jobscat', $request->jobscat);
           
        }
        
          
              return redirect('/freelancer3' );
             

         
    }
    
    

    public function createStep3(Request $request)
    {
        $freelancer = $request->session()->get('freelancer');



       

        return view('freelancers.create4',compact('freelancer'));
    }

    public function PostcreateStep3(Request $request)
    {


        $rules = [];
 

        foreach($request->input('certification_name') as $key => $value) {

            $rules["certification_name.{$key}"] = 'required';
            $rules["provider.{$key}"] = 'required';
            $rules["description.{$key}"] = 'required';
            $rules["attachment.{$key}"] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';

            $rules["date_earned.{$key}"] = 'required';
            
           
            
        }
       

        $a=request()->post();
          $validator = Validator::make($request->all(), $rules);
        

        $cert=$request->session()->put('cert', $a);
        $cert=$request->session()->get('cert');
        $atar=["attachment"=> array("abebe")];
         $cert=array_merge($cert,$atar);
         $cert=$request->session()->put('cert', $cert);

         

 


        if ($validator->passes()) {
            
            foreach ($request->attachment as $photo) {
                $filename = $photo->store('photos');
              
                 
            }
 

            foreach($request->file('attachment') as $key => $value) {
 
                $fileName = "attachment-" . time() . '.' . $value->getClientOriginalExtension();
                $request->attachment[$key]->storeAs('public/attachment', $fileName);
                $cert = $request->session()->get('cert');
                $cert['attachment'][$key]=$fileName;
                $request->session()->put('cert', $cert);


                // dd($cert);
                


            }
            return redirect('/freelancer4' );



        }
        return  redirect()->back()->withErrors($validator);

 
          
         
        
    }

    public function createStep4(Request $request)
    {
        $jobscat = $request->session()->get('jobscat');
          $sk=DB::table('skill')
         ->whereIn('job_catid', $jobscat)
         ->get();
         
                      
       return view('freelancers.create5',compact('sk'));
     }

    public function PostcreateStep4(Request $request)
    {
         $validatedData = $request->validate([
            'skills' => 'required',
         ]);
        if(empty($request->session()->get('skills'))){
            $request->session()->put('skills', $request->skills);
         }else{
     
            $request->session()->put('skills', $request->jobscat);
           
        }
        
          
              return redirect('/freelancer5' );
             

         
    }
    
    
    
    public function createStep5(Request $request)
    {   

        $freelancer = $request->session()->get('freelancer');
        $location = $request->session()->get('location');
        $jobscat = $request->session()->get('jobscat');
        $cert = $request->session()->get('cert');
        $skills = $request->session()->get('skills');
        $catgory=DB::table('job_catagory')
        ->whereIn('id', $jobscat)
        ->get();
        
        $skl=DB::table('skill')
        ->whereIn('job_catid', $skills)
        ->get();
        $request->session()->put('skillslist', $skl);
        $request->session()->put('jobscatlist',$catgory);
        $jobscatlist= $request->session()->get('jobscatlist');
        $skillslist=$request->session()->get('skillslist');
         $pt= DB::select('select * from payment_type where id = ?', [$freelancer->payment_type_id]);
        $ptn;
         foreach ($pt as $key => $p) {
            # code...
            $ptn=$p;

        }
         $request->session()->put('payment_type',$ptn);
        $payment_type=$request->session()->get('payment_type');
        
        //  dd($skillslist);

    
              
        
        return view('freelancers.createsubmit',compact(['payment_type','freelancer','location','jobscatlist','cert','skillslist']));
    }

    

    public function store(Request $request)

    {
         $freelancer = $request->session()->get('freelancer');
        $location = $request->session()->get('location');
        $jobscat = $request->session()->get('jobscat');
        $cert = $request->session()->get('cert');
        $skills = $request->session()->get('skills');
        
        $jobscatlist=$request->session()->get('jobscatlist');
         $location->save();
        $freelancer->lid=$location->id;
        $freelancer->save();
          

      
            foreach ($jobscat as $key => $jc) {
            # code...
            $frelance_job_catagory = new \App\Models\frelance_job_catagory();


            $frelance_job_catagory->fid= $freelancer->id;
            $frelance_job_catagory->jcid= $jc;
            $frelance_job_catagory->save();
          

        }
        foreach ($skills as $key => $freskill) {
            # code...
            $hasskill = new \App\Models\HasSkill();

            $hasskill->freelancer_id= $freelancer->id;
            $hasskill->skill_id= $freskill;
            $hasskill->save();
          

        }

        $limit=sizeof($cert['certification_name']);
        for ($i=0; $i <$limit; $i++) { 
            $education = new \App\Models\Education();
            $education->freelancer_id= $freelancer->id;
            $education->certification_name= $cert['certification_name'][$i];
            $education->provider= $cert['provider'][$i];
            $education->certification_link= $cert['certification_link'][$i];
            $education->description= $cert['description'][$i];
            $education->date_earned= $cert['date_earned'][$i];
            $education->save();
        }
        

        $request->session()->forget('location');
        $request->session()->forget('freelancer'); 
        $request->session()->forget('jobscat'); 
        $request->session()->forget('cert'); 
        $request->session()->forget('skills'); 
        $request->session()->forget('jobscatlist'); 



        return redirect('/freelancer-detail');
    }

    public function freelancer_detail()
    {
        // $freelancer= \App\Models\Freelancer::where('userid', Auth::user()->id)->get();
        $freelancers=\App\Models\Freelancer::where('userid',Auth::user()->id)->get();
        $freelancer="";
        foreach ($freelancers as $key => $freelance) {
            # code...
            $freelancer=$freelance;
 
            // dd($freelance->education);
        }
        $jobscatlist=\App\Models\Frelance_job_catagory::where('fid',$freelancer->id)->get();
        // $skillslist=\App\Models\Frelance_job_catagory::where('fid',$f->id)->get();
           return view('freelancers.detail', compact(['freelancer']));
    }

     
}
