<?php

namespace App\Http\Controllers;

use App\Models\FranchiseApplication;
use Illuminate\Http\Request;

class FranchiseApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'preferred_city' => 'required|string|max:255',
            'investment_capacity' => 'required|string',
            'business_experience' => 'nullable|string',
            'consent_marketing' => 'required|boolean'
        ]);

        $application = FranchiseApplication::create($validated);

        return response()->json([
            'message' => 'Application submitted successfully!',
            'data' => $application
        ], 201);
    }
}