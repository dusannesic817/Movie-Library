<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copy extends Model
{
    use HasFactory;


    protected $fillable=['status','amount','price'];


    public function film():BelongsTo{
        return $this->belongsTo(Film::class);
    }

   /* protected function statuus(): Attribute{ 

            if($this->status == 0){
                $name= "Unavailable";
            }elseif($this->status==1){
                $name= "Available";
            }
         return Attribute::make(
         get: fn () => ($name),
         );
     }*/
}
