<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    use HasFactory;


    protected function fullName(): Attribute{

       
        $fullName = $this->name . " " . $this->surname ;

       


        return Attribute::make(
        get: fn () => ($fullName),
        );
        }
}
