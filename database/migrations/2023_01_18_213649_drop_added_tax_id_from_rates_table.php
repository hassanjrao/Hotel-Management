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
        Schema::table('rates', function (Blueprint $table) {

            $table->dropForeign(['added_tax_id']);
            $table->dropColumn('added_tax_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rates', function (Blueprint $table) {

            $table->foreignId('added_tax_id')->nullable()->constrained('taxes')->onDelete('set null');
            

        });
    }
};
