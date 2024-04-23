<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable=['id','name','year','running_h','running_m','rating','image'];


    public function genres(): BelongsToMany {
        return $this->belongsToMany(Genre::class);
     }

     public function writers(): BelongsToMany {
        return $this->belongsToMany(Person::class, 'film_writer');
     }

     public function stars(): BelongsToMany {
        return $this->belongsToMany(Person::class, 'film_star');
     }

     public function directors(): BelongsToMany {
        return $this->belongsToMany(Person::class, 'film_director'); // ovde sam naveo 'film_director' jer on po defaultu misli da je meni n:m tabela film_person  kao sto gore odmah ucitama jer se i tako zove tabla film_genre
     }


     protected function runningTime(): Attribute{
        return Attribute::make(
        get: fn () => trim(($this->runing_h ? ($this->runinig_h. " h"): "").
                        ($this->runing_m ? ($this->runinig_m. " min") : "")),

        );
        }

        protected function imgSrc(): Attribute{
         return Attribute::make(
         get: fn () =>  ($this->image && Storage::disk('public')->exists($this->image))? 
            Storage::url($this->image): '/storage/film_images/default-movie.jpg'
         );
         }
        

   

}
