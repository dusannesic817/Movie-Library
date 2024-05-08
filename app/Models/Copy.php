<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->belongsToMany(Member::class,'orders')
            ->withPivot('status', 'created_at', 'to_date','quantity'); // nazivi dodatnih atributa
        ;
     }

     public function film(){
        return $this->belongsTo(Film::class);
    }

 

    public function created_at_date(){
        return Carbon::parse($this->pivot->created_at);
    }

    public function to_date(){
        return Carbon::parse($this->pivot->to_date);
    }
    
    
     
}
