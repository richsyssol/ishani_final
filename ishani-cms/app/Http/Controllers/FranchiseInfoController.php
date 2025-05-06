<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FranchiseInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FranchiseInfoController extends Controller
{
    /**
     * Get all franchise information
     */
    public function index()
    {
        $franchiseInfo = FranchiseInfo::first();

        return response()->json([
            'success' => true,
            'data' => $franchiseInfo ? [
                'benefits' => $franchiseInfo->benefits,
                'support' => $franchiseInfo->support,
                'expansion_cities' => $franchiseInfo->expansion_cities,
                'brochure_file' => $franchiseInfo->brochure_file,
                'brochure_url' => $franchiseInfo->brochure_file 
                    ? Storage::url('franchise-brochures/' . $franchiseInfo->brochure_file)
                    : null,
                'updated_at' => $franchiseInfo->updated_at
            ] : null
        ]);
    }

    /**
     * Download brochure file
     */
    public function downloadBrochure()
{
    try {
        $franchiseInfo = FranchiseInfo::firstOrFail();
        
        if (empty($franchiseInfo->brochure_file)) {
            throw new \Exception('No brochure file uploaded');
        }

        $path = "franchise-brochures/{$franchiseInfo->brochure_file}";
        
        if (!Storage::disk('public')->exists($path)) {
            throw new \Exception("File not found at: {$path}");
        }

        return response()->json([
            'success' => true,
            'url' => Storage::url($path),
            'name' => $franchiseInfo->brochure_file,
            'size' => Storage::disk('public')->size($path),
            'last_updated' => $franchiseInfo->updated_at->toIso8601String()
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => "Brochure error: {$e->getMessage()}"
        ], 404);
    }
}

    /**
     * Direct file download endpoint
     */
    public function serveBrochure()
    {
        $franchiseInfo = FranchiseInfo::first();

        if (!$franchiseInfo || !$franchiseInfo->brochure_file) {
            abort(404);
        }

        $path = 'franchise-brochures/' . $franchiseInfo->brochure_file;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::download($path);
    }
}