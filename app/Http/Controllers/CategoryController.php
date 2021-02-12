<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store()
    {
        $category = request()->validate(['name' => 'required']);
        $this->categoryRepository->new($category);
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->remove($category);
    }
}
