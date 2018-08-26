<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Cache::has('categories')) {
            $categories = Category::all();
            Cache::forever('categories', $categories);
        }
        return Cache::get('categories');
    }
}
