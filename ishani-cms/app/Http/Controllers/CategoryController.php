<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::withCount('products')->get()->map(function($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'icon' => $category->icon,
                'description' => $category->description,
                'product_descriptor' => $category->product_descriptor,
                'benefits' => $category->effectiveBenefits,
                // 'products_count' => $category->products_count,
                'collection_text_template' => $category->collection_text_template,
                'created_at' => $category->created_at,
                'updated_at' => $category->updated_at
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    }
