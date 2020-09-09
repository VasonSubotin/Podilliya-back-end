<?php

namespace App\Http\Controllers;

use App\BusinessLogic\MarketPriceAggregator;
use App\Models\MarketData;
use App\Models\Offer;
use App\Models\OurPrice;
use App\Models\Personal;
use App\Providers\MarketPriceServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{

    public $marketPriceServiceProvider;

    public function __construct(MarketPriceAggregator $marketPriceServiceProvider)
    {
        $this->marketPriceServiceProvider = $marketPriceServiceProvider;
    }

    public function index(Request $request)
    {
        $locale    = App::getLocale();
        $ourPrices = OurPrice::all(
            [
                'price_' . $locale . ' as price',
                'culture_name_' . $locale . ' as culture',
            ]
        );

        $offers = Offer::where('is_home_page', true)->orderBy('order_number', 'asc')->get(
            [
                'id',
                'partial_description_' . $locale . ' as partial_description',
                'heading_' . $locale . ' as heading',
                'image_path',
                'price_' . $locale . ' as price',
                'full_description_' . $locale . ' as full_description',
                'is_read_more',
            ]
        );

        return view('index', compact('request', 'ourPrices', 'offers'));
    }

    public function offers(Request $request)
    {
        $locale = App::getLocale();

        $offers = Offer::where('is_offer_page', true)->orderBy('order_number', 'asc')->get(
            [
                'id',
                'partial_description_' . $locale . ' as partial_description',
                'heading_' . $locale . ' as heading',
                'image_path',
                'price_' . $locale . ' as price',
                'full_description_' . $locale . ' as full_description',
                'is_read_more',

            ]
        );

        return view('offers', compact('request', 'offers'));
    }


    public function market(Request $request)
    {
        $locale = App::getLocale();

        Carbon::setLocale($locale);
        $marketData = MarketData::select(
            [
                'id',
                'culture_' . $locale               . ' as culture',
                'delivery_due_data_' . $locale     . ' as delivery_due_data',
                'delivery_terms_' . $locale        . ' as delivery_terms',
                'description_' . $locale           . ' as description',
                'location_' . $locale              . ' as location',
                'month_of_delivery_' . $locale     . ' as month_of_delivery',
                'offer_type_' . $locale            . ' as offer_type',
                'price_' . $locale                 . ' as price',
                'processing_company_' . $locale    . ' as processing_company',
                'valid_until_' . $locale           . ' as valid_until',
                'vat_' . $locale                   . ' as vat',
                'volume_' . $locale                . ' as volume',
                'company_address_' . $locale       . ' as company_address',
                'company_name_' . $locale          . ' as company_name',
                'company_contact_' . $locale       . ' as company_contact',
                'company_telephone_' . $locale     . ' as company_telephone',
                'company_website_' . $locale       . ' as company_website',
                'company_registered_no_' . $locale . ' as company_registered_no',
                'company_director_' . $locale      . ' as company_director',
                'company_owner_' . $locale         . ' as company_owner',
                'company_type_' . $locale          . ' as company_type',
                'published_at_' . $locale          . ' as published_at',
            ]
        )->orderBy('published_sort', 'desc')->paginate(10);

        $prices = $this->marketPriceServiceProvider->getPrices();
        $ukrainePrices = $this->marketPriceServiceProvider->getPriceUkraine();

        return view('market', compact('marketData', 'request', 'prices', 'locale', 'ukrainePrices'));
    }

    public function contacts(Request $request)
    {
        $locale    = App::getLocale();
        $personals = Personal::all(
            [
                'full_name_' . $locale . ' as full_name',
                'department_' . $locale . ' as department',
                'phone',
                'email',
                'photo_path',
            ]
        );

        return view('contacts', compact('request', 'personals'));
    }


}
