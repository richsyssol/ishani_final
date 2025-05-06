<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        
        // Apply filters if provided
        if ($request->has('location') && $request->location != 'All') {
            $query->where('location', $request->location);
        }
        
        if ($request->has('client_type') && $request->client_type != 'All') {
            $query->where('client_type', $request->client_type);
        }
        
        return response()->json([
            'projects' => $query->get(),
            'filters' => [
                'locations' => ['All', 'Bangalore', 'Mumbai', 'Delhi', 'Hyderabad'],
                'client_types' => ['All', 'Residential', 'Commercial', 'Hospitality']
            ]
        ]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }
}