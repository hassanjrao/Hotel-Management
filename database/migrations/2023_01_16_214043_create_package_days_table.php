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
        Schema::create('package_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();

            $table->enum('day',["mon",'tue',"wed","thu","fri","sat","sun"]);

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
        Schema::dropIfExists('package_days');
    }
};
