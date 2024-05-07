<?php

namespace App\Models;

use App\Models\Order;
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
        return $this->belongsToMany(Copy::class, 'orders');
     }

    /* public function orders() {
        return $this->belongsToMany(Order::class);
    }*/
     

}
