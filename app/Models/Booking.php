<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function getBookingIdAttribute()
    {
        return 'BID-'.str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

}
