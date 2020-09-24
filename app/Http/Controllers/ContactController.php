<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("noreply@podiliyagold.com", "Example User");
        $email->setSubject("Test illia");
        $email->addTo("illia.kyzlaitis.cv@gmail.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv(env('SENDGRID')));

        $response = $sendgrid->send($email);

        return response()->json(['success' => true], 201);
    }
}
