<?php

namespace App\Http\Controllers;

use App\Models\CustomerTestimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerTestimonialController extends Controller
{
    /**
     * Display a listing of visible testimonials.
     */
    public function index()
    {
        $testimonials = CustomerTestimonial::visible()
            ->ordered()
            ->get(['quote', 'name', 'location', 'rating']);

        return response()->json([
            'success' => true,
            'data' => $testimonials,
            'message' => 'Testimonials retrieved successfully'
        ]);
    }

    /**
     * Display the specified testimonial.
     */
    public function show($id)
    {
        $testimonial = CustomerTestimonial::visible()
            ->findOrFail($id, ['quote', 'name', 'location']);

        return response()->json([
            'success' => true,
            'data' => $testimonial,
            'message' => 'Testimonial retrieved successfully'
        ]);
    }
}
