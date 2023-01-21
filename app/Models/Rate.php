<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function includedTax()
    {
        return $this->belongsTo(Tax::class, 'included_tax_id');
    }

    public function addedTaxes()
    {
        return $this->belongsToMany(Tax::class, 'rate_tax');
    }

    public function childrenRates()
    {
        return $this->hasMany(ChildrenRate::class);
    }
}
