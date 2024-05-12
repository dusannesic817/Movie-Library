<?php

namespace App\Models;

use App\Models\Copy;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['copy_id','member_id','status','created_at','to_date'];


   public function copy() {
        return $this->belongsTo(Copy::class, 'copy_id', 'id');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    

    
}
