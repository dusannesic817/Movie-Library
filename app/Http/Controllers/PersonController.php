<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Exception;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Person::orderBy('name')->paginate(5);


        return view('person.index' ,  ['person'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([

            'name'=>'required',
            'surname'=>'required',
            'b_date'=>'nullable|date',

        ]);


        Person::create($request->all());

        $request->session()->flash('alertType','success');
        $request->session()->flash('alertMsg','Successfully added');

        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('person.edit',['person'=>$person]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([

            'name'=>'required',
            'surname'=>'required',
            'b_date'=>'nullable|date',

        ]);


        $person->update($request->all());

        $request->session()->flash('alertType','success');
        $request->session()->flash('alertMsg','Successfully update');

        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {

        try{
            $person->delete();
        
            session()->flash('alertType','success');
            session()->flash('alertMsg','Successfully deleted');
    
            return redirect()->route('person.index');
        }catch(Exception $e){

            session()->flash('alertType','danger');
            session()->flash('alertMsg','Cannot be deleted');

            return redirect()->route('person.index');
        }
       
    }
}
