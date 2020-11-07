<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use DB;
use App\Models\Freelancer;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;

class proposalController extends Controller
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

    public function viewproposal($eid)
    {
        //
        $hashids = new Hashids();
       $id=$hashids->decode($eid);
      
        $proposal=\App\Models\proposal::where('id',$id)->FirstOrFail();
        $status=\App\Models\ProposalStatusCatalog::all();
        return view("proposals.viewproposal",compact(['proposal','status','hashids']));
  
        
    } 
    public function changeproposalstatus(Request $request)
    {
        //       
        $proposal=\App\Models\proposal::where('id',$request->id)->FirstOrFail();
        $proposal->current_proposal_status =$request->proposal_status;
         $proposal->save();
        $status=\App\Models\ProposalStatusCatalog::all();
        return  redirect()->back();
    } 

    public function createcontract(Request $request,$eid)
    {
        //    
        $hashids = new Hashids();
        $id=$hashids->decode($eid);
        $request->session()->forget("contratproposalid");
        $request->session()->put("contratproposalid",$id);
        $proposal=\App\Models\proposal::where('id',$id)->FirstOrFail();
        return view("contract.makecontract",compact(['proposal']));
    }
    public function storecontract(Request $request)
    {
        //   
        $hashids = new Hashids();
        $id=$request->session()->get("contratproposalid");
       
        $proposal=\App\Models\proposal::where('id',$id)->First();
        $contractsentcheck=\App\Models\Contract::where('proposal_id', $proposal->id)->First();
        $pid=encrypt( $proposal->id);
        if ( $contractsentcheck!=null && $contractsentcheck->approval==1) {
            # code...
            return redirect("/cproposals")->with('failure','You have already made contract with this proposal!!!!!');
        }
        elseif($contractsentcheck!=null && $contractsentcheck->approval==0)
        {
            return view("payment.createpayment", compact(["proposal","hashids","pid"]));

        }
        else{
             $validatedData = $request->validate([
               'start_date' => 'required|before:end_date',
               'end_date' => 'required',
    
            ]);
      
            $contract = new \App\Models\Contract();
            $contract->proposal_id = $proposal->id;
            $contract->company_id = $proposal->job->hire_manager->company->id;
            $contract->freelancer_id =$proposal->freelancer->id;
            $contract->start_time = $request->start_date;
            $contract->end_time = $request->end_date;
            $contract->payment_type_id  = $proposal->payment_type->id;
            $contract->payment_amount  = $proposal->payment_amount;
            $contract->save();  
             return view("payment.createpayment", compact(["proposal",'hashids','pid']));
        }
        
    }
    public function makepayment(Request $request)
    {
        $id=$request->session()->get("contratproposalid");
        $proposal=\App\Models\proposal::where('id',$id)->FirstOrFail();
        $contractsentcheck=\App\Models\payment::where('proposal_id', $proposal->id)->First();
         
        if ( $contractsentcheck!=null) {
            # code...
            return redirect("/contracts")->with('failure','You have already submitted payment information!!!!!');
        }
        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
        $paymentfileName = "reciept_photo-" . time() . '.' . $request->file('reciept_photo')->getClientOriginalExtension();
        $request->reciept_photo->storeAs('public/attachment', $paymentfileName);
        $payment = new \App\Models\payment();
        $payment->bank_name=$request->bank_name;
        $payment->tid= $request->tid;
        $payment->reciept_photo = $paymentfileName;
        $payment->proposal_id=$proposal->id;
        $payment->hiremanagerl_id = $cleint->id;
        $payment->save();
        $proposal->current_proposal_status=3;
        $proposal->save();
        $contracts=\App\Models\payment::where('hiremanagerl_id',$cleint->id)->get();

        return view("contract.contracts",compact(['contracts']));
  

    }

    public function contracts ()
    {
        //    
        $hashids = new Hashids();

        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
         
        $contracts=\App\Models\contract::where('hiremanager_id',$cleint->id)->get();
        //  foreach ($contracts as $key => $contract) {
        //     # code...
        //     dd($contract->proposal['id']);
        // }
        return view("contract.contracts",compact(['contracts','hashids']));
      } 


      public function fcontracts ()
      {
          //    
        $hashids = new Hashids();
          $freelancer=\App\Models\freelancer::where('userid',Auth::user()->id)->firstOrFail();
           
          $contracts=\App\Models\contract::where('freelancer_id',$freelancer->id)->get();
          //  foreach ($contracts as $key => $contract) {
          //     # code...
          //     dd($contract->proposal['id']);
          // }
        //   foreach ($contracts as $key => $contract) {
        //       # code...
        //       echo ($contract->cleint->user->name);
        //   }
          return view("contract.fcontracts",compact(['contracts','hashids']));
        } 

        public function viewcontract ($eid)
    {
        //
        $hashids = new Hashids();
       $id=$hashids->decode($eid);
      
        $contract=\App\Models\contract::where('id',$id)->FirstOrFail();
        $status=\App\Models\ProposalStatusCatalog::all();
        return view("contract.viewcontract",compact(['contract','status']));
  
        
    } 
    public function Hpayments()
    {
        //
      
        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->first();
        $hpayments=\App\Models\payment::where('hiremanagerl_id',$cleint->id)->get();
 
        // foreach ($hpayments as $key => $hpayment) {
        //     # code...
        //     dd($hpayment->proposals->job->id);
        // }
        // dd($hpayments);
        return view("payment.hirepayments",compact(['hpayments']));
  
        
    }
    public function Freelancerproposals()
    {
        //
        $hashids = new Hashids();
        
      
        $freelancer=\App\Models\Freelancer::where('userid',Auth::user()->id)->firstOrFail();
        $fproposal=\App\Models\proposal::where('freelancer_id',$freelancer->id)->get();
        // foreach ($cleintproposal as $key => $cp) {
        //     # code...
        //     dd($cp->job->name);
        // }
        return view("proposals.freelancerproposals",compact(['fproposal','hashids']));
  
        
    }
    public function cleintproposals()
    {
        //
        $hashids = new Hashids();

         $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
          $jobscollection=DB::table('job')
         ->where('hire_manager_id', $cleint->id)
         ->get();

         $jobs=array();
       foreach ($jobscollection as $key => $job) {
        # code...
        array_push($jobs,$job->id);
         }
         $cleintproposal = \App\Models\proposal::wherein('job_id',$jobs)->get();
    //      $cleintproposal=DB::table('proposal')
    //    ->whereIn('job_id', $jobs)
    //    ->get();
       return view("proposals.cleintproposals",compact(['cleintproposal','hashids']));
  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //
        $freelancer=\App\Models\Freelancer::where('userid',Auth::user()->id)->firstOrFail();
        $proposalsentcheck= DB::table('proposal')->where([
            ['job_id', '=', $id],
            ['freelancer_id', '=', $freelancer->id],
        ])->get();
  
        if (sizeof($proposalsentcheck)!=0) {
            # code...
            return redirect("/jobs")->with('failure','You Have Already sent proposal for this job!!!!!');
        }
       
        $request->session()->forget('jobid');
        $request->session()->forget('screening');
      
        $job = \App\Models\job::find($id);
        if (sizeof($job->other_skills)<=0) {
            # code...
            return redirect('/submit/proposalnext');
        }
        $request->session()->put('jobid',$id);
        return view('proposals.create',compact(['job']));
    }
    public function createPost(Request $request)
    {
        //
       

        $answers=request()->post();
        $request->session()->put('screening', $answers);
        return redirect('/submit/proposalnext');
    }
    public function nextCreate(Request $request)
    {
        $payment_type=DB::table('payment_type')->get(); 
        return view("proposals.step2",compact(['payment_type']));
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nn(Request $request)
    {
       
        if (empty($request->session()->get('screening'))) {
            # code...
            // return redirect("/jobs");
            $custommessage=["payment_amount.required"=>"you need to set payment amount First ",
            "payment_type_id.required"=>"you need to select Payment type"
            ,"fid.unique"=>"You have already sent the proposal"];
            $validatedData = $request->validate([
               'payment_amount' => 'required',
               'payment_type_id' => 'required',
               'fid' =>  'unique:Proposal',
    
            ],$custommessage);
            $fileName = "proposalfile-" . time() . '.' . $request->file('proposalfile')->getClientOriginalExtension();
            $request->proposalfile->storeAs('public/attachment', $fileName);
            $proposal = new \App\Models\Proposal();
            $proposal->proposalfile=$fileName;
            $proposal->payment_amount= $request->payment_amount;
            $proposal->payment_type_id =$request->payment_type_id;
            $proposal->job_id =$request->session()->get('jobid');
            $proposal->current_proposal_status=1;
            $proposal->freelancer_id=$freelancer->id;
    
     
            $proposal->save();
    
            //
            return redirect("/fproposals")->with('success','Proposal Sent Successfully!!');
        }else {
            $screening= $request->session()->get('screening');
            $freelancer=\App\Models\Freelancer::where('userid',Auth::user()->id)->firstOrFail();
           // $freelancer = DB::table('users')->get();
           $request->fid=$freelancer->id;
           $limit=sizeof($screening['qid']);
           for ($i=0; $i <$limit; $i++) { 
               $answerq = new \App\Models\Answer();
               $answerq->freelancer_id= $freelancer->id;
                $answerq->questionid= $screening['qid'][$i];
                $answerq->answer= $screening['sq'][$i];
               $answerq->save();
           }
           $custommessage=["payment_amount.required"=>"you need to set payment amount First ",
           "payment_type_id.required"=>"you need to select Payment type"
           ,"fid.unique"=>"You have already sent the proposal"];
           $validatedData = $request->validate([
              'payment_amount' => 'required',
              'payment_type_id' => 'required',
              'fid' =>  'unique:Proposal',
   
           ],$custommessage);
           $fileName = "proposalfile-" . time() . '.' . $request->file('proposalfile')->getClientOriginalExtension();
           $request->proposalfile->storeAs('public/attachment', $fileName);
           $proposal = new \App\Models\Proposal();
           $proposal->proposalfile=$fileName;
           $proposal->payment_amount= $request->payment_amount;
           $proposal->payment_type_id =$request->payment_type_id;
           $proposal->job_id =$request->session()->get('jobid');
           $proposal->current_proposal_status=1;
           $proposal->freelancer_id=$freelancer->id;
   
    
           $proposal->save();
   
           //
           return redirect("/fproposals")->with('success','Proposal Sent Successfully!!');
        }
    
                
      
    }
    public function nextCreatepost(Request $request)
    {
 
      
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
