<?php

namespace App\Http\Controllers;

use App\Models\HeroContent;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroContents = HeroContent::all();
        return response()->json($heroContents);
    }
    
    
}