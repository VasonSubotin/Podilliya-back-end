<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price_en');
            $table->string('price_uk');
            $table->string('image_path');
            $table->string('heading_en');
            $table->string('heading_uk');
            $table->string('partial_description_en', 1024);
            $table->string('partial_description_uk', 1024);
            $table->text('full_description_en');
            $table->text('full_description_uk');

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
        Schema::dropIfExists('offers');
    }
}
