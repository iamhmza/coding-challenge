<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Product;

class ProductsController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store()
    {
        $product = request()->only(['name', 'description', 'price', 'image']);
        $this->productRepository->new($product);
    }

    public function destroy(Product $product)
    {
        $this->productRepository->remove($product);
    }
}
