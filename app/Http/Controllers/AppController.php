<?php

namespace App\Http\Controllers;

use App\Models\MarketData;
use App\Models\OurPrice;
use App\Models\Personal;
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
        $locale = App::getLocale();
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
