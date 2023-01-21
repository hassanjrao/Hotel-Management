<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function releaseStatus(){
        return $this->belongsTo(ReleaseStatus::class,'release_status','code');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function activityImages(){
        return $this->hasMany(ActivityImage::class);
    }
}
