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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->string("name");

            $table->enum('check_in_day',["mon",'tue',"wed","thu","fri","sat","sun"])->nullable();
            $table->enum('check_out_day',["mon",'tue',"wed","thu","fri","sat","sun"])->nullable();

            $table->integer("min_nights")->nullable();
            $table->integer("max_nights")->nullable();

            $table->foreignId("created_by")->constrained("users")->cascadeOnDelete();


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
        Schema::dropIfExists('packages');
    }
};
