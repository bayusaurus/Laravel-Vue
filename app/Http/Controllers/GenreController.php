<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Genre};

class GenreController extends Controller
{
    public function index()
    {
        return Genre::get(['id', 'name']);
    }
    public function getAll()
    {
        return Genre::get();
    }
}
