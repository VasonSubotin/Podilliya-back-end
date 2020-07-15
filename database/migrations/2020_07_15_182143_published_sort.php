<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublishedSort extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_data', function (Blueprint $table) {
            $table->timestamp('published_sort')->nullable()->default(null);
        });

        foreach (\App\Models\MarketData::all() as $data) {
            $data->published_sort = \Carbon\Carbon::parse($data->published_at_en)->timestamp;
            $data->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_data', function (Blueprint $table) {
            $table->removeColumn('published_sort');
        });
    }
}
