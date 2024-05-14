<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Copy;
use App\Models\Film;
use App\Models\Order;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
   
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
        session(['member_id'=>$member->id]);
    
        $lastFive = Order::where('member_id', $member->id)
        ->with('copy.film')
        ->latest() 
        ->take(5) 
        ->get()
        ->pluck('copy.film.name')
        ->unique();

        $owes = Order::where('member_id', $member->id)
        ->where('status', 1) 
        ->with('copy.film')
        ->latest() 
        ->take(5) 
        ->get()
        ->map(function ($order) {
            return [
                'order_id' => $order->id,
                'film_name' => $order->copy->film->name,
            ];
        })
        ->unique();

        $allMovies = Order::where('member_id', $member->id)
        ->with('copy.film')
        ->get()
        ->pluck('copy.film.name')
        ->unique();


        $favoriteGenres = Film::whereIn('name', $allMovies->toArray()) 
        ->with('genres') 
        ->get()
        ->flatMap(function ($film) {
            return $film->genres->pluck('name_en');
        });

        $top3_genres = $favoriteGenres->countBy()->sortDesc()->take(3);
        $favorites = $top3_genres->keys()->toArray();

        $amount=Payment::where('member_id', $member->id)
                        ->pluck('amount')
                        ->sum();
                      

        $totalDebt= $this->totalDebt($member->id,$amount);

        $totalSpent = Order::where('member_id', $member->id)
                    ->with('copy:id,price')  // ovde sam pokupio iz copy tabele copy.id i copy.price isto kao kad bih tako gledao u sql
                    ->get()  // ovde sta uzimam, uzimam quantity ali da bih uporedio sa stranim kljucem moram i copy_id
                    ->sum(function ($order){  //sabira ($order) prdstavlja kroz koju tabelu prolazi gde se nalaze ti podaci sto ih zelim koja je glavna tabela iz koje krecem da dohvatam
                        return $order->copy->price;
                    });
         
        return view ('member.show',[
            'member'=>$member,
            'lastFive'=>$lastFive,
            'owes'=>$owes,
            'favorites'=>$favorites,
            'totalDebt'=>$totalDebt,
            'totalSpent'=>$totalSpent
        
        ]);
    }

  
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
