<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{

    public function localization(Request $request, string $lang)
    {
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
