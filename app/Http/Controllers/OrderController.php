<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
  

        $orders = Order::with('copy.film','member')->paginate(10);; // ovde copy.film stoji spojeno zato sto sam ucitao, copy tabelu i povezao je sa film jer su spojene, a i member sam pozvao da i iz nje iscitavam podatke ako zelim
        $uniqueCopies = $orders->unique('copy_id')->pluck('copy'); // ovde sam ucitao sve iz order prvo, pa onda zatrazio sve jedinstvene copy_id iz order tabele, onda pluck() vraca sve podatke nekog objekta, u mom slucaju sam zatrazio sve podate iz tabele copies za jednistven copy_id koji sam izvukao iz orders
        $uniqueCopies = $uniqueCopies->sortBy('film.name');

    
        return view('order.index', [
            'orders'=>$orders,
            'uniqueCopy'=>$uniqueCopies,
           
        ]);
        
    }


    public function list(Copy $copy){
    
        return view('order.list',
        ['list'=>$copy,
    ]);
      
    }

   
    public function create(Copy $copy)
    {
      
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
            'created_at'=>'required',
            'to_date'=>'required',

        ]);

        $copy_id=session('copy_id');
        $copy = Copy::findOrFail($copy_id);
      
       

        $id_number = $request->input('id_number');
        $member_id = Member::where('id_number', $id_number)->value('id'); // dobijam samo taj jeda id, ne kolekciju kao sa get
      
        if($copy->amount > 0 && $copy->status=="Available"){
            
            $copy->update(['amount'=>$copy->amount - 1]);

            Order::create([
                'copy_id' => $copy_id,
                'member_id' => $member_id,
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

            if($copy->amount <= 0 ){
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

    

           

        return view('order.edit',[
            'order'=>$order,
            
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {

        $request->validate([
            'status'=>'required'
        ]);

        $order->update($request->all());

        $copy = Copy::findOrFail($order->copy_id);

        if($order){
            $copy->update(['amount'=>$copy->amount + 1]);
        }
        
        return redirect()->route('member.show', ['member' => $order->member_id]);

       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

}
