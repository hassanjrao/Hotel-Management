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
        Schema::create('children_rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId("rate_id")->constrained("rates")->onDelete("cascade");

            $table->integer("age_min");
            $table->integer("age_max");

            $table->decimal("price", 10, 2);

            

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
        Schema::dropIfExists('children_rates');
    }
};
