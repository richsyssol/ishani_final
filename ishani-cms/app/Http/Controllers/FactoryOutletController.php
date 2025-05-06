<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FactoryOutlet;
use Illuminate\Http\Request;

class FactoryOutletController extends Controller
{
    public function index()
    {
        $outlet = FactoryOutlet::where('is_active', true)->first();

        if (!$outlet) {
            return response()->json([
                'success' => false,
                'message' => 'Factory outlet information not available'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $outlet
        ]);
    }
}