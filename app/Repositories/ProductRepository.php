<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    public function all($sortedBy = 'created_at')
    {
        // Product::all();
        return Product::orderBy($sortedBy)->get();
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
