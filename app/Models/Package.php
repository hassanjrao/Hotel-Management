<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by");
    }

    public function packageDays(){
        return $this->hasMany(PackageDay::class);
    }
}
