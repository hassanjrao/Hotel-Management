<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room()
    {
        return $this->belongsToMany(Room::class);
    }

    public function includedTax()
    {
        return $this->belongsTo(Tax::class, "included_tax_id");
    }

    public function addedTaxes()
    {
        return $this->belongsToMany(Tax::class, "service_tax");
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by");
    }


    public function releaseStatus()
    {
        return $this->belongsTo(ReleaseStatus::class, 'release_status', 'code');
    }

    public static function priceTypes()
    {

        return [
            [
                "code" => "night",
                "name" => "Night"
            ], [
                "code" => "person",
                "name" => "Person"
            ], [
                "code" => "person_per_night",
                "name" => "Person Per Night"
            ], [
                "code" => "adult",
                "name" => "Adult"
            ], [
                "code" => "adult_per_night",
                "name" => "Adult Per Night"
            ], [
                "code" => "child",
                "name" => "Child"
            ], [
                "code" => "child_per_night",
                "name" => "Child Per Night"
            ], [
                "code" => "fixed_price",
                "name" => "Fixed Price"
            ], [
                "code" => "quantity",
                "name" => "Quantity"
            ], [
                "code" => "quantity_per_night",
                "name" => "Quantity Per Night"
            ], [
                "code" => "quantity_per_person_per_night",
                "name" => "Quantity Per Person Per Night"
            ], [
                "code" => "quantity_per_adult_per_night",
                "name" => "Quantity Per Adult Per Night"
            ], [
                "code" => "quantity_per_child_per_night",
                "name" => "Quantity Per Child Per Night"
            ]
        ];
    }
}
