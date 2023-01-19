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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId("hotel_id")->constrained("hotels")->onDelete("cascade");

            $table->foreignId("room_id")->constrained("rooms")->onDelete("cascade");

            $table->date("start_date");
            $table->date("end_date");

            $table->foreignId("package_id")->constrained("packages")->onDelete("cascade");

            $table->decimal("price_per_night", 10, 2);

            $table->integer("total_people")->nullable();

            $table->decimal("price_extra_adult", 10, 2)->nullable();
            $table->decimal("price_extra_child", 10, 2)->nullable();

            $table->decimal("fixed_supplement", 10, 2)->nullable();

            $table->decimal("discount", 10, 2)->nullable();

            $table->enum("discount_type", ["percentage", "fixed"])->nullable();

            $table->foreignId("included_tax_id")->constrained("taxes")->onDelete("cascade");
            $table->foreignId("added_tax_id")->constrained("taxes")->onDelete("cascade");


            $table->foreignId("created_by")->constrained("users")->onDelete("cascade");

            $table->softDeletes();



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
        Schema::dropIfExists('rates');
    }
};
