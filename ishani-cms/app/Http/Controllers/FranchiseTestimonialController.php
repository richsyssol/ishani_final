<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FranchiseTestimonial;

class FranchiseTestimonialController extends Controller
{
    /**
     * Display a listing of testimonials
     */
    public function __invoke()
    {
        return response()->json([
            'data' => FranchiseTestimonial::select(['name', 'location', 'quote', 'rating'])
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}