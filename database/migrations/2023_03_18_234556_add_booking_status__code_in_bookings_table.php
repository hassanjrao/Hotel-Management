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
        Schema::table('bookings', function (Blueprint $table) {


            $table->string("status_code")->nullable()->after("total_persons");
            // $table->foreign("status_code")->references("code")->on("booking_statuses")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {

            // $table->dropForeign("bookings_status_code_foreign");
            $table->dropColumn("status_code");

        });
    }
};
