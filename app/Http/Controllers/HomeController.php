<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Order;
use App\Models\Member;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if(Auth::id()){

            $usertype= Auth()->user()->user_type;

            if($usertype=="user"){
                return view('home');

            }elseif($usertype=="admin"){
                
                //mogao bih da izlistam 10 najpopularnijih filmova umesto sve
                

                $sales=Order::count();
                $orders = Order::all();

                $data=$orders->map(function ($orders){
                    return [
                        'copy_id' => $orders->copy_id,
                        'price' => $orders->copy->price,
                       
                    ];
                });
               
                $sum=0;

                foreach($data as $value){
                    $sum+=$value['price'];
                  
                }

               
                $member=Member::count();
                $datas=Film::latest()->get();
                $populateData= $request->all();
                $genres=Genre::all();
                $people= Person::all();
                return view('admin.index' ,  [
                    'datas'=>$datas,
                    'populateData'=> $populateData,
                    'genres'=> $genres,
                    'people'=>$people,
                    'member'=>$member,
                    'sales'=>$sales,
                    'sum'=>$sum
                    
                ]);
            }else{
                return redirect()->back();
            }
            
        }

       

    }
}
