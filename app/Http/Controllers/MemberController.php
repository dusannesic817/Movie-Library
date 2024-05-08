<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data=Member::orderBy('name')->paginate(5);
        return view('member.index',['member'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('member.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'surname' =>'required',
            'id_number'=> 'required|unique:members,id_number|between:12,13',
            'city'=>'required',
            'address'=>'required',
            'b_date' => [
                'required',
                function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->age;
                    if ($age < 18) {
                        $fail('Korisnik je maloletan.');
                    }
                    
                },]

        ]);

        $member=Member::create($request->all());
        $new_member=$member->id;

        $request->session()->flash('alertType','success');
        $request->session()->flash('alertMsg','Successfully added ID. '.$new_member);

        return redirect()->route('member.index');
    }

   
    public function show(Member $member)
    {
        return view ('member.show', ['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view ('member.edit', ['member'=>$member]);
    }


    public function update(Request $request, Member $member)
    {
        
        $request->validate([
            'name'=>'required',
            'surname' =>'required',
            'id_number'=> ['required','between:12,13' ,Rule::unique('members','id_number')->ignore($member->id)],
            'city'=>'required',
            'address'=>'required',
            'b_date' => [
                'required',
                function ($attribute, $value, $fail) {
                    $age = Carbon::parse($value)->age;
                    if ($age < 18) {
                        $fail(trans('validation.under-age'));
                    }
                },]

        ]);

        $member->update($request->all());

        $request->session()->flash('alertType','success');
        $request->session()->flash('alertMsg','Successfully updated');

        return redirect()->route('member.index');
    }


    public function destroy(Member $member)
    {

        $member->delete();

        session()->flash('alertType','success');
        session()->flash('alertMsg','Successfully deleted');

        return redirect()->route('member.index');

    }



}
