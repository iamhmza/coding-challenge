<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function new($product)
    {
        return Product::create($product);
    }

    public function remove($product)
    {
        $product->delete();
    }
}
