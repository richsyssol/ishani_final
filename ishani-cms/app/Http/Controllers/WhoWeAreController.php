<?php

namespace App\Http\Controllers;

use App\Models\WhoWeAre;

class WhoWeAreController extends Controller
{
    public function index()
    {
        $data = WhoWeAre::where('is_active', true)->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}