<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    public function genres(): BelongsToMany {
        return $this->belongsToMany(Genre::class);
     }


     protected function runingTime(): Attribute{
       
        
        return Attribute::make(
        get: fn () => ($this->runing_h ? $this->runinig_h. " h"),
        );
        }
     
}
