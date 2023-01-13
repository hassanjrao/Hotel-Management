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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("title");
            $table->string("sub_title")->nullable();
            $table->string("title_tag");
            $table->text("main_text")->nullable();
            $table->string("video_url")->nullable();
            $table->string("lat");
            $table->string("lng");
            $table->text("description")->nullable();
            $table->string('release');
            $table->boolean("home_page")->default(false);
            $table->string("image")->nullable();

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
        Schema::dropIfExists('destinations');
    }
};
