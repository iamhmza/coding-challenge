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
        return $this->productRepository->all();
    }

    public function store()
    {
        $product = request()->only(['name', 'description', 'price', 'image']);
        $this->productRepository->new($product);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $this->productRepository->remove($product);

        return redirect('/products');
    }
}
