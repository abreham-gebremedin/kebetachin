<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Hashids\Hashids;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //  
        $hashids = new Hashids();

        $freelancer=\App\Models\freelancer::where('userid',Auth::user()->id)->firstOrFail();
         $contracts=\App\Models\contract::where('freelancer_id',$freelancer->id)
         ->orderBy('updated_at', 'DESC')
         ->distinct('proposal_id')
        ->get();
        //   foreach ($contracts as $key => $contract) {
        //      # code...
        //      foreach ($contract->proposal->messages as $mkey => $message) {
        //          # code...
        //          dd($message);
        //      }
              $firstmessage=$contracts->first();
               
         //  }
         return view("messages.message",compact(['contracts','hashids','firstmessage']));

    }
    public function index2()
    {
        //
         //  
        $hashids = new Hashids();

        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();            
         $contracts=\App\Models\contract::where('hiremanager_id',$cleint->id)
         ->orderBy('updated_at', 'DESC')
         ->distinct('proposal_id')
        ->get();
        //   foreach ($contracts as $key => $contract) {
        //      # code...
        //      foreach ($contract->proposal->messages as $mkey => $message) {
        //          # code...
        //          dd($message);
        //      }
              $firstmessage=$contracts->first();
               
         //  }
         return view("messages.cmessages",compact(['contracts','hashids','firstmessage']));

    }

    public function fview($eid)
    {
        //
         //    
        $hashids = new Hashids();
        $id=$hashids->decode($eid);
         $freelancer=\App\Models\freelancer::where('userid',Auth::user()->id)->firstOrFail();
       
         $contracts=\App\Models\contract::where('freelancer_id',$freelancer->id)
         ->orderBy('updated_at', 'DESC')
         ->distinct('proposal_id')
        ->get();
        //   foreach ($contracts as $key => $contract) {
        //      # code...
        //      foreach ($contract->proposal->messages as $mkey => $message) {
        //          # code...
        //          dd($message);
        //      }
        $firstmessage=\App\Models\contract::where('proposal_id',$id)->first();
                
          
         return view("messages.message",compact(['contracts','firstmessage','hashids']));

    }
    public function cview($eid)
    {
        //
         //    
        $hashids = new Hashids();
        $id=$hashids->decode($eid);
         $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();

            
         $contracts=\App\Models\contract::where('hiremanager_id',$cleint->id)
          ->orderBy('updated_at', 'DESC')
         ->distinct('proposal_id')
        ->get();
        //   foreach ($contracts as $key => $contract) {
        //      # code...
        //      foreach ($contract->proposal->messages as $mkey => $message) {
        //          # code...
        //          dd($message);
        //      }
        $firstmessage=\App\Models\contract::where('proposal_id',$id)->first();
                
          
         return view("messages.cmessages",compact(['contracts','firstmessage']));

    }
    public function send(Request $request)
    {
        //
        $this->validate($request, [
            'message' => 'required',
             // 'tags' => 'required',
        ]);  
        $firstmessage=\App\Models\contract::where('proposal_id',$request->proposal)->first();

        $message = new \App\Models\message();
        $message->freelancer_id  = $firstmessage->proposal->freelancer->id;
        $message->hire_manager_id  = $firstmessage->proposal->job->hire_manager->id;
        $message->message_text =$request->message;
        $message->proposal_id  =$firstmessage->proposal->id;
        $message->mymessage =Auth::user()->id;      
        $message->save();  
        $firstmessage->touch();
         return  redirect()->back();
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
