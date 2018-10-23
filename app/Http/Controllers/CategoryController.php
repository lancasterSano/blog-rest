<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Cache::has('categories')) {
            Cache::forever('categories', Category::all());
        }
        return Cache::get('categories');
    }
}
