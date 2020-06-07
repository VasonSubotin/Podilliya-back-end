<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {

        return view('index');
    }

    public function offers(Request $request)
    {

        return view('offers');
    }


    public function market(Request $request)
    {

        return view('market');
    }

    public function contacts(Request $request)
    {

        return view('contacts');
    }



}
