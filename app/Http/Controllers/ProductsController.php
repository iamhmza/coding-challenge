<?php

namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function store()
    {
        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => request('image'),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
