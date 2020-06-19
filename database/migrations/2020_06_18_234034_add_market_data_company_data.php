<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketDataCompanyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_data', function (Blueprint $table) {
            $table->string('company_name_en', 512);
            $table->string('company_contact_en', 512);
            $table->string('company_telephone_en', 512);
            $table->string('company_website_en', 512);
            $table->string('company_registered_no_en', 512);
            $table->string('company_director_en', 512);
            $table->string('company_owner_en', 512);
            $table->string('company_type_en', 512);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_data', function (Blueprint $table) {
            $table->dropColumn('company_name_en');
            $table->dropColumn('company_contact_en');
            $table->dropColumn('company_telephone_en');
            $table->dropColumn('company_website_en');
            $table->dropColumn('company_registered_no_en');
            $table->dropColumn('company_director_en');
            $table->dropColumn('company_owner_en');
            $table->dropColumn('company_type_en');
        });
    }
}
