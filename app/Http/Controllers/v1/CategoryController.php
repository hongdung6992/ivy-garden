<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(Category $category)
    {
        $categories = $category->select('id', 'title')->get();
        return response()->json($categories, Response::HTTP_OK);
    }
}
