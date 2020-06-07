<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('offer_type_id');
            $table->unsignedSmallInteger('culture_id');
            $table->unsignedSmallInteger('deal_type_id');
            $table->unsignedInteger('terminal_id');
            $table->unsignedInteger('port_id');
            $table->unsignedSmallInteger('currency_id');
            $table->string('recycler_id');
            $table->boolean('is_active')->default(true);
            $table->timestamp('offer_date');
            $table->decimal('amount')->default(0);
            $table->decimal('price')->default(0);
            $table->string('vat');
            $table->string('delivery_deadline');
            $table->string('delivery_month');
            $table->smallInteger('validity');
            $table->string('place')->nullable();
            $table->string('additional_info', 1024);
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
        Schema::dropIfExists('market_data');
    }
}
