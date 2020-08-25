<?php

namespace App\Console\Commands;

use App\Models\MarketData;
use App\Models\ScrappedDataRecord;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ProcessScrappedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Converts json to database data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = ScrappedDataRecord::all();

        foreach ($data as $record) {
            $decodedScrappedData = json_decode($record->scrapped_data);
            $hash                = md5($record->scrapped_data);
            $marketData          = MarketData::where('hash', $hash)->first();
            if (!$marketData) {
                (MarketData::create(
                    [
                        'culture_en'               => $decodedScrappedData->cultureEn,
                        'delivery_due_data_en'     => $decodedScrappedData->deliveryDueDataEn,
                        'delivery_terms_en'        => $decodedScrappedData->deliveryTermsEn,
                        'description_en'           => $decodedScrappedData->descriptionEn,
                        'location_en'              => $decodedScrappedData->locationEn,
                        'month_of_delivery_en'     => $decodedScrappedData->monthOfDeliveryEn,
                        'offer_type_en'            => $decodedScrappedData->offerTypeEn,
                        'price_en'                 => $decodedScrappedData->priceEn,
                        'processing_company_en'    => $decodedScrappedData->processingCompanyEn,
                        'valid_until_en'           => $decodedScrappedData->validUntilEn,
                        'vat_en'                   => $decodedScrappedData->vatEn,
                        'volume_en'                => $decodedScrappedData->volumeEn,
                        'company_name_en'          => $decodedScrappedData->companyNameEn,
                        'company_contact_en'       => $decodedScrappedData->companyContactEn,
                        'company_telephone_en'     => $decodedScrappedData->companyTelephoneEn,
                        'company_website_en'       => $decodedScrappedData->companyWebsiteEn,
                        'company_registered_no_en' => $decodedScrappedData->companyRegisteredNoEn,
                        'company_director_en'      => $decodedScrappedData->companyDirectorEn,
                        'company_owner_en'         => $decodedScrappedData->companyOwnerEn,
                        'company_type_en'          => $decodedScrappedData->companyTypeEn,
                        'company_address_en'       => $decodedScrappedData->companyAddressEn,
                        'published_at_en'          => $decodedScrappedData->publishedEn,

                        'culture_uk'               => $decodedScrappedData->cultureUk,
                        'delivery_due_data_uk'     => $decodedScrappedData->deliveryDueDataUk,
                        'delivery_terms_uk'        => $decodedScrappedData->deliveryTermsUk,
                        'description_uk'           => $decodedScrappedData->descriptionUk,
                        'location_uk'              => $decodedScrappedData->locationUk,
                        'month_of_delivery_uk'     => $decodedScrappedData->monthOfDeliveryUk,
                        'offer_type_uk'            => $decodedScrappedData->offerTypeUk,
                        'price_uk'                 => $decodedScrappedData->priceUk,
                        'processing_company_uk'    => $decodedScrappedData->processingCompanyUk,
                        'valid_until_uk'           => $decodedScrappedData->validUntilUk,
                        'vat_uk'                   => $decodedScrappedData->vatUk,
                        'volume_uk'                => $decodedScrappedData->volumeUk,
                        'company_name_uk'          => $decodedScrappedData->companyNameUk,
                        'company_contact_uk'       => $decodedScrappedData->companyContactUk,
                        'company_telephone_uk'     => $decodedScrappedData->companyTelephoneUk,
                        'company_website_uk'       => $decodedScrappedData->companyWebsiteUk,
                        'company_registered_no_uk' => $decodedScrappedData->companyRegisteredNoUk,
                        'company_director_uk'      => $decodedScrappedData->companyDirectorUk,
                        'company_owner_uk'         => $decodedScrappedData->companyOwnerUk,
                        'company_type_uk'          => $decodedScrappedData->companyTypeUk,
                        'company_address_uk'       => $decodedScrappedData->companyAddressUk,
                        'published_at_uk'          => $decodedScrappedData->publishedUk,
                        'hash'                     => $hash,
                        'published_sort'           => Carbon::parse($decodedScrappedData->publishedEn),
                    ]
                ))->save();
                $record->delete();
            }
        }
    }
}
