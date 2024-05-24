<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.index', compact('categories'));
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        $subcategories = $category->children;
        return view('categories.show', compact('category', 'subcategories'));
    }


    public function showDetails($id)
    {
        $category = Category::findOrFail($id);
        $subcategories = $category->children;
        return view('categories.details', compact('category', 'subcategories'));
    }
}
