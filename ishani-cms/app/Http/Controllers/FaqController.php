<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of visible FAQs.
     */
    public function index()
    {
        $faqs = Faq::visible()
            ->ordered()
            ->get(['question', 'answer']);

        return response()->json([
            'success' => true,
            'data' => $faqs,
            'message' => 'FAQs retrieved successfully'
        ]);
    }

    /**
     * Display the specified FAQ.
     */
    public function show($id)
    {
        $faq = Faq::visible()
            ->findOrFail($id, ['question', 'answer']);

        return response()->json([
            'success' => true,
            'data' => $faq,
            'message' => 'FAQ retrieved successfully'
        ]);
    }
}
