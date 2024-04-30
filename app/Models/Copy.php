<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Copy extends Model
{
    use HasFactory;


    protected $fillable=['amount','price'];


    public function film():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
