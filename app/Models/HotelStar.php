<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelStar extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
