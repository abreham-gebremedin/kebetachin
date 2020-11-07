<?php

namespace App\Http\Controllers;
new \App\Models\Location;
use Illuminate\Http\Request;
use DB;
use App\Models\HireManager;
use Illuminate\Support\Facades\Auth;



class componyController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('location');
        $request->session()->forget('company');


         
        //  $company =\App\Models\Company::with('location')->all();
         $company = DB::table('company')->join('location', 'location.id', '=', 'company.lid')->paginate(4);
         

        return view('company.index',compact('company'));
    }

  
    public function createStep2(Request $request)
    {
        $company = $request->session()->get('company');

        return view('company.step2',compact('company'));
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'overview' => 'required',

        ]);
        if(empty($request->session()->get('company'))){
            $company = new \App\Models\Company();
            $company->fill($validatedData);
            $request->session()->put('company', $company);
        }else{
            $company = $request->session()->get('company');
            $company->fill($validatedData);
            $request->session()->put('company', $company);
        }
        $request->session()->put('r', '/company3');
         
       return redirect('/location1' );
         
    }
    
    public function createStep3(Request $request)
    {   

        $company = $request->session()->get('company');
        $location = $request->session()->get('location');

   
        return view('company.step4',compact(['company','location']));
    }

    

    public function store(Request $request)

    {
        $location = $request->session()->get('location');
        $company = $request->session()->get('company');

        $location->save();


        $company->lid=$location->id;
      


        $company->save();
        $HireManager = new \App\Models\HireManager();
        $HireManager->user_account_id=Auth::user()->id;
        $HireManager->locationid=$location->id;
        $HireManager->company_id= $company->id;
        $HireManager->save();


        return redirect('/data');
    }
}
