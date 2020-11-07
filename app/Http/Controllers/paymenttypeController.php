<?php

namespace App\Http\Controllers;
use YenePay\Models\IPN;
use YenePay\Models\PDT;
use YenePay\Models\CheckType;
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;
use Hashids\Hashids;

use Illuminate\Http\Request;
 
 

 

class paymenttypeController extends Controller
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
    public function pay(Request $request)
    {
        $hashids = new Hashids();
 
        $sellerCode = "0518";
	$successUrl = "http://localhost:8000/yenepaysuccess"; //"YOUR_SUCCESS_URL";
	$cancelUrl = "http://localhost:8000/yenepaycancel"; //"YOUR_CANCEL_URL";
	$ipnUrl = "http://localhost:8000/ipn"; //"YOUR_IPN_URL";
	$useSandbox = true; // set this to false if you are on production environment

    $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
	$checkoutOptions -> setSuccessUrl($successUrl);
	$checkoutOptions -> setCancelUrl($cancelUrl);
	$checkoutOptions -> setIPNUrl($ipnUrl);
    $proposal=\App\Models\proposal::where('id',decrypt($request->ItemName))->FirstOrFail();
     $contractsentcheck=\App\Models\payment::where('proposal_id', $proposal->id)->First();
     
    if ( $contractsentcheck!=null) {
        # code...
        return redirect("/contracts")->with('failure','You have already deposited the  payment for this contract!!!!!');
    }
	$checkoutOrderItem = new CheckoutItem($proposal->job->name,$proposal->payment_amount,1);
	if(isset($proposal->id))
	{
		$checkoutOrderItem  -> setId($proposal->id);
	}
	if(isset($request->DeliveryFee))
	{
		$checkoutOrderItem  -> setDeliveryFee($request->DeliveryFee);
	}
	if(isset($request->Tax1))
	{
		$checkoutOrderItem  -> setTax1($request->Tax1);
	}
	if(isset($request->Tax2))
	{
		$checkoutOrderItem  -> setTax2($request->Tax2);
	}
	if(isset($request->Discount))
	{
		$checkoutOrderItem  -> setDiscount($request->Discount);
	}
	if(isset($request->HandlingFee))
	{
		$checkoutOrderItem  -> setHandlingFee($request->HandlingFee);
	}
    // dd($checkoutOptions);
 	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
    // dd($checkoutUrl);
    $request->session()->forget('paymentproposalid');
    $request->session()->put('paymentproposalid',encrypt($proposal->id) );
       return redirect($checkoutUrl);
	// header("Location: " . $checkoutUrl);
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
