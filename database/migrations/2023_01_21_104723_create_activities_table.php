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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("sub_title")->nullable();

            $table->integer("max_children")->default(0);
            $table->integer("max_adults")->default(0);
            $table->integer("max_people")->default(0);

            $table->text("description")->nullable();

            $table->decimal("price_per_person", 8, 2)->default(0);

            $table->integer("duration")->default(0);

            $table->enum("duration_unit", ["minutes", "hours", "days", "weeks"]);


            $table->string("lat");
            $table->string("lng");

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
        Schema::dropIfExists('activities');
    }
};
