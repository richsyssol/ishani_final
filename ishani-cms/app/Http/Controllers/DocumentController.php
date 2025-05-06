<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all(['id', 'name', 'file_path']);
    return response()->json($documents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(Document $document): BinaryFileResponse 
{
    try {
        // Validate document exists (implicitly handled by route model binding)
        
        // Construct full file path
        $filePath = storage_path('app/' . $document->file_path);
        
        // Verify file exists
        if (!file_exists($filePath)) {
            abort(404, "File not found at path: {$document->file_path}");
        }

        // Get file metadata
        $fileName = $document->name ?: basename($document->file_path);
        $mimeType = mime_content_type($filePath);
        $fileSize = filesize($filePath);

        // Prepare response
        $response = new BinaryFileResponse($filePath);
        
        // Set headers
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $fileName,
            iconv('UTF-8', 'ASCII//TRANSLIT', $fileName) // Handle special characters
        );
        
        $response->headers->set('Content-Type', $mimeType);
        $response->headers->set('Content-Length', $fileSize);
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        return $response;

    } catch (\Exception $e) {
        // Log detailed error
        \Log::error("Download failed for document {$document->id}: " . $e->getMessage());
        
        abort(500, "Failed to download file. Please try again later.");
    }
}
}
