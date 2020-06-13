<?php

namespace App\Http\Controllers;

use App\Models\MarketData;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {

        return view('index', compact('request'));
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
