<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by");
    }

    public function releaseStatus(){
        return $this->belongsTo(ReleaseStatus::class, "release_status", "code");
    }
}
