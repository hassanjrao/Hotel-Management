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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId("hotel_id")->constrained("hotels")->cascadeOnDelete();

            $table->foreignId("created_by")->constrained("users")->cascadeOnDelete();


            $table->string("title");
            $table->string("sub_title");

            $table->integer("max_children")->default(0);
            $table->integer("max_adults")->default(0);
            $table->integer("max_people")->default(0);
            $table->integer("min_people")->default(0);

            $table->text("description")->nullable();

            $table->integer("total_rooms");

            $table->decimal("price_per_night", 10, 2);

            $table->string("release_status");

            $table->boolean("home_page")->default(false);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
