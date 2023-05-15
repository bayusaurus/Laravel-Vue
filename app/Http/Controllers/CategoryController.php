<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category};

class CategoryController extends Controller
{
    public function index()
    {
        return Category::get(['id', 'name']);
    }
    public function getAll()
    {
        return Category::get();
    }
}
