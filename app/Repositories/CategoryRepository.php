<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function new($category)
    {
        return Category::create($category);
    }

    public function remove($category)
    {
        $category->delete();
    }
}
