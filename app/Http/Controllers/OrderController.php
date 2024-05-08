<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Film;
use App\Models\Order;
use App\Models\Member;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('copy.film','member')->get();
        $uniqueCopies = $orders->unique('copy_id')->pluck('copy');

        //$copyMemberCounts = $orders->groupBy('copy_id')->map->groupBy('member_id')->map->count();
        $uniqueCopies = $uniqueCopies->sortBy('film.name');


        return view('order.index', [
        
            'orders'=>$orders,
            'uniqueCopy'=>$uniqueCopies,
           // 'copyMemberCounts'=>$copyMemberCounts
           
        ]);
        
    }


    public function list(Copy $copy){
    
        return view('order.list',
        ['list'=>$copy,
     
       
    ]);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Copy $copy)
    {
        $member=Member::all();
        $film=Film::all();

        session(['copy_id' => $copy->id]);

        return view('order.create',[
            'copy'=>$copy,
            'film'=>$film

        ]);
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'id_number'=>'required|exists:members,id_number|between:12,13',
            'quantity'=>'required|numeric',
            'created_at'=>'required',
            'to_date'=>'required',

        ]);

        $copy_id=session('copy_id');
        $copy = Copy::findOrFail($copy_id);
        $order_quantity = $request->input('quantity');
       

        $id_number = $request->input('id_number');
        $member_id = Member::where('id_number', $id_number)->value('id'); // dobijam samo taj jeda id, ne kolekciju kao sa get
      
        if($order_quantity <= $copy->amount && $copy->amount > 0 && $copy->status=="Available"){
            
            $copy->update(['amount'=>$copy->amount - $order_quantity]);

            Order::create([
                'copy_id' => $copy_id,
                'member_id' => $member_id,
                'quantity' => $request->input('quantity'),
                'created_at' => $request->input('created_at'),
                'to_date' => $request->input('to_date'),
            ]);

            if($request->session()->has('copy_id')) {
                $request->session()->forget('copy_id');
            }
        

            $request->session()->flash('alertType','success');
            $request->session()->flash('alertMsg','Successfull Order.');
        }else{

        $alertMsg='';

            if($order_quantity > $copy->amount && $copy->amount <= 0 ){
                $alertMsg="Unavailable amount";
            }elseif($copy->status !="Available"){
                $alertMsg="Film is unavailable";
            }

            $request->session()->flash('alertType','danger');
            $request->session()->flash('alertMsg', $alertMsg);

        }

        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

}
