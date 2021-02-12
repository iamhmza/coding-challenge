<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function store()
    {
        Category::create([
            'name' => Request('name')
        ]);
    }
}
