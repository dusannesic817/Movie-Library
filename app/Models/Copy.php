<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Copy extends Model
{
    use HasFactory;


    protected $fillable=['status','amount','price'];

     public function member(){
        return $this->belongsToMany(Member::class,'orders');
     }

     public function film():BelongsTo{
        return $this->belongsTo(Film::class);
    }

    /* public function orders() {
        return $this->belongsToMany(Order::class);
    }*/
     
}
