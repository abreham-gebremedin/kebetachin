<?php

namespace App\Http\Controllers;
use YenePay\Models\IPN;
use YenePay\CheckoutHelper;
use YenePay\Models\CheckoutType;
use YenePay\Models\Enums;

use Illuminate\Http\Request;
 

class ipncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ipnModel = new IPN();
        $ipnModel->setUseSandbox(true);
        
        $json_data = json_decode(file_get_contents('php://input'), true);
        
        if(isset($json_data["TotalAmount"]))
            $ipnModel->setTotalAmount($json_data["TotalAmount"]);
        if(isset($json_data["BuyerId"]))
            $ipnModel->setBuyerId($json_data["BuyerId"]);
        if(isset($json_data["MerchantOrderId"]))
            $ipnModel->setMerchantOrderId($json_data["MerchantOrderId"]);
        if(isset($json_data["MerchantId"]))
            $ipnModel->setMerchantId($json_data["MerchantId"]);
        if(isset($json_data["MerchantCode"]))
            $ipnModel->setMerchantCode($json_data["MerchantCode"]);
        if(isset($json_data["TransactionCode"]))
            $ipnModel->setTransactionCode($json_data["TransactionCode"]);
        if(isset($json_data["TransactionId"]))
            $ipnModel->setTransactionId($json_data["TransactionId"]);
        if(isset($json_data["Status"]))
            $ipnModel->setStatus($json_data["Status"]);
        if(isset($json_data["Currency"]))
            $ipnModel->setCurrency($json_data["Currency"]);
        if(isset($json_data["Signature"]))
            $ipnModel->setSignature($json_data["Signature"]);
        
        $helper = new CheckoutHelper();
        if ($helper->isIPNAuthentic($ipnModel))
        {	//This means the payment is completed
            //You can now mark the order as "Paid" or "Completed" here and start the delivery process
            echo 'Success!';
            dd($ipnModel);
        }
        else
            echo 'Fail';
        return $this->Respond(200, true, $authentic);
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
