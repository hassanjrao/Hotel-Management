<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("booking_id");
            $table->foreign("booking_id")->references("id")->on("bookings")->onDelete("cascade");


            $table->unsignedBigInteger("hotel_id");
            $table->foreign("hotel_id")->references("id")->on("hotels")->onDelete("cascade");

            $table->unsignedBigInteger("room_id");
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete("cascade");

            $table->integer("persons");

            $table->decimal("price_per_night", 10, 2);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details');
    }
};
