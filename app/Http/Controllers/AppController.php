<?php

namespace App\Http\Controllers;

use App\Models\MarketData;
use App\Models\OurPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $locale   = App::getLocale();
        $ourPrices = OurPrice::all(
            [
                'price_' . $locale . ' as price',
                'culture_name_' . $locale . ' as culture',
            ]
        );

        return view('index', compact('request', 'ourPrices'));
    }

    public function offers(Request $request)
    {
        return view('offers', compact('request'));
    }


    public function market(Request $request)
    {
        $marketData = MarketData::paginate(10);

        return view('market', compact('marketData', 'request'));
    }

    public function contacts(Request $request)
    {
        return view('contacts', compact('request'));
    }


}
