<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorldPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_prices', function (Blueprint $table) {
            $table->string('market_en');
            $table->string('market_uk');
            $table->string('percent_en');
            $table->string('percent_uk');
            $table->string('price_en');
            $table->string('price_uk');
            $table->string('crop_en');
            $table->string('crop_uk');
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
        Schema::drop('world_prices');
    }
}
