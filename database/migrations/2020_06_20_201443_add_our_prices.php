<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOurPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_prices', function (Blueprint $table) {
            $table->string('culture_name_en', 256);
            $table->string('culture_name_uk', 256);
            $table->string('price_en', 256);
            $table->string('price_uk', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_prices', function (Blueprint $table) {
            $table->string('culture_name_en');
            $table->string('culture_name_uk');
            $table->string('price_en');
            $table->string('price_uk');
        });
    }
}
