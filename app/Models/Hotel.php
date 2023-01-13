<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hotelStar(){
        return $this->belongsTo(HotelStar::class);
    }

    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function releaseStatus(){
        return $this->belongsTo(ReleaseStatus::class,'release_status','code');
    }

    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }
}
