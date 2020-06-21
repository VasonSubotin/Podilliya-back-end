<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagsPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->unsignedSmallInteger('order_number')->default(1);
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->boolean('is_home_page')->default(true);
            $table->boolean('is_read_more')->default(true);
            $table->unsignedSmallInteger('order_number')->default(1);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->dropColumn('order_number');
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('is_home_page');
            $table->dropColumn('is_read_more');
            $table->dropColumn('order_number');
        });
    }
}
