<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment.create');  
    
    }


    public function store(Request $request)
    {
        $member_id = session('member_id');

        $request->validate([
                'amount'=>'required'
        ]);
 

        $amount=$request->input('amount');
        $total=$this->totalDebt($member_id, $amount);

       $payment= Payment::create([
            'member_id'=>$member_id,
            'amount'=>$amount
        ]);

       
        return redirect()->route('member.show',['member'=>$member_id]);
    }

   
    

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
