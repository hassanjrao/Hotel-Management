<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function releaseStatus()
    {
        return $this->belongsTo(ReleaseStatus::class, 'release_status', 'code');
    }

    public static function homePageDestinations()
    {

        return self::where("home_page", 1)->get();
    }
}
