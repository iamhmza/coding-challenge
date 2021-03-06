<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function viewing_all_product_list()
    {
        // $products = factory(Product::class, 3)
        // ->has(Category::class, 1)
        // ->create();

        $products = factory(Product::class, 3)->create();
        $response = $this->get('/products');

        $this->assertCount(3, Product::all());
        $response->assertSuccessful();
    }

    /** @test */
    public function a_product_can_be_created()
    {
        $response = $this->post('/product/store', [
            'name' => 'product1',
            'description' => 'this is product one',
            'price' => 10,
            'image' => '/images/01'
        ]);

        $this->assertCount(1, Product::all());
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $this->post('/product/store', [
            'name' => 'product1',
            'description' => 'this is product one',
            'price' => 10,
            'image' => '/images/01'
        ]);

        $product = Product::first();
        $response = $this->delete('/product/' . $product->id);

        $this->assertCount(0, Product::all());
    }
}
