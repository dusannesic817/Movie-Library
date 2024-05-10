<?php

namespace App\Models;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable=['name','surname','id_number','city','address','b_date'];

    protected function fullName(): Attribute{ 
        
        $fullName = $this->name . " " . $this->surname ;
         return Attribute::make(
         get: fn () => ($fullName),
         );
     }


    public function copy(){
        return $this->belongsToMany(Copy::class, 'orders')
                    ->withPivot('status', 'created_at', 'to_date'); // Dodajte nazive dodatnih atributa;
     }

    /* public function orders() {
        return $this->belongsToMany(Order::class);
    }*/
     
    public function rest_days(Carbon $to_date){

        $currentDate = Carbon::now();
        
        return ceil($currentDate->diffInDays($to_date));
    }


    protected function date(): Attribute{       
        $date = Carbon::parse($this->b_date)->format('M-d-Y');
        return Attribute::make(
        get: fn () => ($date),
        );
    }

}
