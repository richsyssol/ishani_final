<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;

class ContactInformationController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInformation::first();
        return response()->json(data: $contactInfo);
    }
}