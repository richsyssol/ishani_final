<?php

namespace App\Http\Controllers;

use App\Models\CompanyInformation;
use Illuminate\Http\JsonResponse;

class CompanyInformationController extends Controller
{
    /**
     * Get company info (for API consumers, if needed)
     */
    public function index(): JsonResponse
    {
        $data = CompanyInformation::first();
        return response()->json($data);
    }

}