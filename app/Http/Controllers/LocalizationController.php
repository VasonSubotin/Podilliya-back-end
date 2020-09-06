<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{

    public function localization(string $lang)
    {
        $languages = [
            'en',
            'uk',
        ];

        if(in_array($lang, $languages)) {
            Session::put('locale', $lang);
        } else {
            Session::put('locale', 'en');
        }

        return redirect()->back();
    }
}
