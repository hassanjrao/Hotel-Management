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
        Schema::table('booking_details', function (Blueprint $table) {

            $table->renameColumn("persons", "total_persons");
            $table->integer("total_rooms")->nullable()->after("total_amount");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_details', function (Blueprint $table) {

            $table->renameColumn("total_persons", "persons");
            $table->dropColumn("total_rooms");
        });
    }
};
