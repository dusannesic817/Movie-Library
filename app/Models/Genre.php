<?php

namespace App\Models;


use App\Models\Film;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Genre extends Model
{
    use HasFactory;

    protected $fillable=['id','name_en','name_sr'];

    public function films() : BelongsToMany{
        return $this->belongsToMany(Film::class);
    }

   

    protected function name(): Attribute{
        $local=App::currentLocale();
        
        return Attribute::make(
        get: fn () => ($local=='sr' ? $this->name_sr : $this->name_en),
        );
        }
        
        

}
