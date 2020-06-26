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
                $table->string('culture_en', 512);
                $table->string('delivery_due_data_en');
                $table->string('delivery_terms_en', 128);
                $table->text('description_en');
                $table->string('location_en');
                $table->string('month_of_delivery_en');
                $table->string('offer_type_en');
                $table->string('price_en');
                $table->string('processing_company_en');
                $table->string('valid_until_en');
                $table->string('vat_en');
                $table->string('volume_en');
                $table->string('company_address_en', 512);

                $table->string('company_name_en', 512);
                $table->string('company_contact_en', 512);
                $table->string('company_telephone_en', 512);
                $table->string('company_website_en');
                $table->string('company_registered_no_en', 512);
                $table->string('company_director_en', 512);
                $table->string('company_owner_en', 512);
                $table->string('company_type_en', 512);


                $table->string('culture_uk', 512);
                $table->string('delivery_due_data_uk');
                $table->string('delivery_terms_uk', 512);
                $table->text('description_uk');
                $table->string('location_uk');
                $table->string('month_of_delivery_uk');
                $table->string('offer_type_uk');
                $table->string('price_uk');
                $table->string('processing_company_uk');
                $table->string('valid_until_uk');
                $table->string('vat_uk');
                $table->string('volume_uk');

                $table->string('company_name_uk', 512);
                $table->string('company_contact_uk', 512);
                $table->string('company_telephone_uk', 512);
                $table->string('company_website_uk', 512);
                $table->string('company_registered_no_uk', 512);
                $table->string('company_director_uk', 512);
                $table->string('company_owner_uk', 512);
                $table->string('company_type_uk', 512);
                $table->string('company_address_uk', 512);
                $table->string('published_at_uk', 512);
                $table->string('published_at_en', 512);
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
        Schema::create(
            'market_data',
            function (Blueprint $table) {
                $table->dropColumn('culture_uk');
                $table->dropColumn('delivery_due_data_uk');
                $table->dropColumn('delivery_terms_uk');
                $table->dropColumn('description_uk');
                $table->dropColumn('location_uk');
                $table->dropColumn('month_of_delivery_uk');
                $table->dropColumn('offer_type_uk');
                $table->dropColumn('price_uk');
                $table->dropColumn('processing_company_uk');
                $table->dropColumn('valid_until_uk');
                $table->dropColumn('vat_uk');
                $table->dropColumn('volume_uk');

                $table->dropColumn('company_name_uk');
                $table->dropColumn('company_contact_uk');
                $table->dropColumn('company_telephone_uk');
                $table->dropColumn('company_website_uk');
                $table->dropColumn('company_registered_no_uk');
                $table->dropColumn('company_director_uk');
                $table->dropColumn('company_owner_uk');
                $table->dropColumn('company_type_uk');
                $table->dropColumn('company_address_uk');
                $table->dropColumn('published_at_uk');
                $table->dropColumn('published_at_en');
            }
        );
    }
}
