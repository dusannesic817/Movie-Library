<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        

        $data = Copy::leftJoin('films', 'copies.film_id', '=', 'films.id')
        ->select('copies.*')
        ->orderBy('films.name')
        ->paginate(5); 
    
        return view('copy.index', ['copy'=>$data]);
      
    }

    public function create()
    {
        return view('copy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

   
    public function show(Copy $copy)
    {
        return view('copy.show', [
            'copy'=>$copy]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Copy $copy)
    {
        return view ('copy.edit',[
            'copy'=>$copy]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Copy $copy)
    {

      

    
  

   


        $request->validate([
            'amount'=>'required',
            'price'=>'required|numeric|between:0,999999.99',
            'status' => 'required'
        ]);

        $copy->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Copy $copy)
    {
        //
    }
}
