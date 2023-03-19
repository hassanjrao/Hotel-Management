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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

            $table->date("from_date")->nullable();
            $table->date("to_date")->nullable();

            $table->unsignedBigInteger("destination_id")->nullable();
            $table->foreign("destination_id")->references("id")->on("destinations")->onDelete("cascade");


            $table->integer("total_rooms");
            $table->integer("total_persons");
            $table->decimal("total_amount", 10, 2);



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
        Schema::dropIfExists('bookings');
    }
};
