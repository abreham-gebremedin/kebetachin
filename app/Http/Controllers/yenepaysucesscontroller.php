<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YenePay\Models\PDT;
use YenePay\CheckoutHelper;
use Illuminate\Support\Facades\Auth;

 

class yenepaysucesscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pdtToken = "fztT3VhmdcumE4";
$pdtRequestType = "PDT";
$pdtModel = new PDT($pdtToken);
$pdtModel->setUseSandbox(true);
		
if(isset($_GET["TransactionId"]))
	$pdtModel->setTransactionId($_GET["TransactionId"]);
if(isset($_GET["MerchantOrderId"]))
	$pdtModel->setMerchantOrderId($_GET["MerchantOrderId"]);
	

$helper = new CheckoutHelper();
$result = $helper->RequestPDT($pdtModel);

if($result['result'] == "SUCCESS"){
	$order_status = $result['Status'];
	if($order_status == 'Paid')
	{
        $id=decrypt($request->session()->get("paymentproposalid"));
        $proposal=\App\Models\proposal::where('id',$id)->FirstOrFail();
        $contractsentcheck=\App\Models\payment::where('proposal_id', $proposal->id)->First();
         
        if ( $contractsentcheck!=null) {
            # code...
            return redirect("/contracts")->with('failure','You have already submitted payment information!!!!!');
        }
        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->firstOrFail();
         $payment = new \App\Models\payment();
        $payment->ProjectName=$proposal->job->name;
        $payment->yenepayTransactionCode= $result['TransactionCode'];
        $payment->yenepayTransactionId = $result['TransactionId'];
        $payment->proposal_id =$proposal->id;
        $payment->hiremanagerl_id  = $cleint->id;
        $payment->TotalAmount  = $result['TotalAmount'];
        $payment->freelancerid  = $proposal->freelancer->id;
        $payment->status  = $cleint->id;

        $payment->save();
        $proposal->current_proposal_status=3;
        $proposal->save();
        return redirect("/hpayment")->with('success',"Your payment has been succed you can start comunicating with your freelancer by messaging");
         
        // dd($result);
		// This means the payment is completed. 
		// You can extract more information of the transaction from the $result array
		// You can now mark the order as "Paid" or "Completed" here and start the delivery process
	}
}
else{
	//This means the pdt request has failed.
	//possible reasons are 
		//1. the TransactionId is not valid
        //2. the PDT_Key is incorrect
        return redirect("/cproposals")->with('failure',"whoops!! something is wrong your payment failed check your yenepay account");
        
}

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
