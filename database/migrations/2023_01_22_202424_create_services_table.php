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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string("title");

            $table->text("description")->nullable();

            $table->string("price_type");
            $table->decimal("price", 8, 2);

            $table->foreignId("included_tax_id")->nullable()->constrained("taxes");

            $table->boolean("is_mandatory")->default(false);

            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();

            $table->string("release_status");

            $table->foreignId("created_by")->nullable()->constrained("users")->onDelete("set null");

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
        Schema::dropIfExists('services');
    }
};
