<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $services = $category->services()->paginate(9);
        return view('services.index', compact('services', 'category'));
    }
}