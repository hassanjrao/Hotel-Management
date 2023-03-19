<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }


    public function releaseStatus(){
        return $this->belongsTo(ReleaseStatus::class,'release_status','code');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function roomClosingDates(){
        return $this->hasMany(RoomClosingDate::class);
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class);
    }

    public function rate(){
        return $this->hasOne(Rate::class);
    }
}
