<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketDataUa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'market_data',
            function (Blueprint $table) {
                $table->id();
                $table->string('culture_en');
                $table->string('delivery_due_data_en');
                $table->string('delivery_terms_en');
                $table->text('description_en');
                $table->string('location_en');
                $table->string('month_of_delivery_en');
                $table->string('offer_type_en');
                $table->string('price_en');
                $table->string('processing_company_en');
                $table->string('valid_until_en');
                $table->string('vat_en');
                $table->string('volume_en');
                $table->string('company_address_en');

                $table->string('company_name_en');
                $table->string('company_contact_en');
                $table->string('company_telephone_en');
                $table->string('company_website_en');
                $table->string('company_registered_no_en');
                $table->string('company_director_en');
                $table->string('company_owner_en');
                $table->string('company_type_en');


                $table->string('culture_uk');
                $table->string('delivery_due_data_uk');
                $table->string('delivery_terms_uk');
                $table->text('description_uk');
                $table->string('location_uk');
                $table->string('month_of_delivery_uk');
                $table->string('offer_type_uk');
                $table->string('price_uk');
                $table->string('processing_company_uk');
                $table->string('valid_until_uk');
                $table->string('vat_uk');
                $table->string('volume_uk');

                $table->string('company_name_uk');
                $table->string('company_contact_uk');
                $table->string('company_telephone_uk');
                $table->string('company_website_uk');
                $table->string('company_registered_no_uk');
                $table->string('company_director_uk');
                $table->string('company_owner_uk');
                $table->string('company_type_uk');
                $table->string('company_address_uk');
                $table->string('published_at_uk');
                $table->string('published_at_en');
                $table->string('hash')->default('');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(
            'market_data');

    }
}
