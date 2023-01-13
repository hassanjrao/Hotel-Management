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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("sub_title")->nullable();
            $table->text("description")->nullable();

            $table->unsignedBigInteger("destination_id");
            $table->foreign("destination_id")->references("id")->on("destinations")->onDelete("cascade");

            $table->unsignedBigInteger("hotel_star_id");
            $table->foreign("hotel_star_id")->references("id")->on("hotel_stars")->onDelete("cascade");

            $table->string("phone")->nullable();
            $table->string("email")->unique()->nullable();

            $table->string("address");

            $table->string("lat");
            $table->string("lng");

            $table->string("paypal_email")->nullable();

            $table->string("release_status");

            $table->boolean("home_page")->default(false);



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
        Schema::dropIfExists('hotels');
    }
};
