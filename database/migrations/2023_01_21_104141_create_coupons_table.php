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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("code");
            $table->decimal("discount", 8, 2);
            $table->enum("type", ["fixed", "percentage"]);
            $table->boolean("one_time")->default(false);
            $table->dateTime("valid_from")->nullable();
            $table->dateTime("valid_to")->nullable();
            $table->string("release_status");

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
        Schema::dropIfExists('coupons');
    }
};
