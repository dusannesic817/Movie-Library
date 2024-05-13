<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    const PENALTY= 1.2;


    public function totalDebt($member_id , $amount){
        $order = Order::where('member_id', $member_id)
        ->with('copy') 
        ->get();
    
        $data = $order->map(function ($order) {
        return [
            'to_date' => $order->to_date,
            'price' => $order->copy->price,
           
        ];
    });

    $currentDate = Carbon::now();
    $sum=0;
    foreach($data as $value){

       $to_date= $value['to_date'];
        $parse= ceil($currentDate->diffInDays($to_date));
        $priceArray=[];
        if($parse<0){
            $priceArray[]= abs($parse)* self::PENALTY + $value['price'];
        }else{
            $sum+=$value['price'];
        }
    
        foreach($priceArray as $value){
            $sum+=$value;
        }

    }

    return $sum - $amount;
    }

 
}

