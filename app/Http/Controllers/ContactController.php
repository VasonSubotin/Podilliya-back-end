<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function store(Request $request)
    {
        Contact::create(
            [
                'email'   => $request->email ?? '',
                'name'    => $request->name ?? '',
                'message' => $request->message ?? '',
            ]
        );

        return response()->json(['success' => true], 201);
    }
}
