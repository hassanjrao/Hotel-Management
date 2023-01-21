<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function releaseStatus(){
        return $this->belongsTo(ReleaseStatus::class,'release_status','code');
    }


}
