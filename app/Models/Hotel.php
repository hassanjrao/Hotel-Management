<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory,SoftDeletes;

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

    public function images(){
        return $this->hasMany(HotelImage::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public static function publishedHotels(){
        return self::where("release_status","PUBLISHED")->get();
    }

    public static function topHotels(){
        return self::where("home_page",1)->where("release_status","published")->latest()->take(6)->get();
    }
}
