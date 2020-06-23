<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{

    public function localization(Request $request, string $lang)
    {
        $langs = [
            'en',
            'uk',
        ];

        if(in_array($lang, $langs)) {
            Session::put('locale', $lang);
        } else {
            Session::put('locale', 'en');
        }

        return redirect()->back();
    }
}
