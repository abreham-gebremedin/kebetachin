<?php

namespace App\Http\Controllers;
use Mail;
use Hashids\Hashids;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isfreelancerregistered');
        $this->middleware('verified');

    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session()->forget('usertype');
        $request->session()->put('usertype',"freelancer");
        return redirect("/home");
        
        // adminpanel.admindashboard
    }
    public function adminHome()
    {
        return view('adminpanel.admindashboard');

    }
    public function clientsession(Request $request)
    {    $request->session()->forget('usertype');
        $request->session()->put('usertype',"client");
        return redirect("/jobs");
        // adminpanel.admindashboard
    } 
     public function freelancersession(Request $request)
    {    $request->session()->forget('usertype');
        $request->session()->put('usertype',"freelancer");
        return redirect("/jobs");
        // adminpanel.admindashboard
    }

    public function hmecategories()
    {   
      
         
        $hashids = new Hashids();
        $homejobcategory=\App\Models\JobCatagory::orderBy('updated_at','Asc')->paginate(10);// display with pagination
        return view('jobs.homejobcategory',compact(['homejobcategory','hashids']));


    }
    public function email() {
        
        $data = array('name'=>"Abreham Gebremedin");

        Mail::send('mail', $data, function($message) {
           $message->to('abrehamgebremedin12@gmail.com', 'kebetachin.com')->subject
              ('Laravel  Testing Mail');
           $message->from('kebetfreelancing@gmail.com','Kebet');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
}
