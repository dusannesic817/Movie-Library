<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    use HasFactory;


    protected $fillable=['name','surname','b_date'];


    protected function fullName(): Attribute{ 
       $fullName = $this->name . " " . $this->surname ;
        return Attribute::make(
        get: fn () => ($fullName),
        );
    }


    protected function date(): Attribute{       
        $date = Carbon::parse($this->b_date)->format('M-d-Y');
        return Attribute::make(
        get: fn () => ($date),
        );
    }
}
