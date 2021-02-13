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

    public function index()
    {
        if (request()->has('sortedBy')) {
            $sortedBy = request()->query('sortedBy');
            return $this->productRepository->all($sortedBy);
        }
        return $this->productRepository->all();
    }

    public function store()
    {
        $product = request()->only(['name', 'description', 'price', 'image', 'category_id']);
        $imagePath = request('image')->store('images');
        $product['image'] = $imagePath;

        return $this->productRepository->new($product);
    }

    public function destroy(Product $product)
    {
        return $this->productRepository->remove($product);
    }
}
