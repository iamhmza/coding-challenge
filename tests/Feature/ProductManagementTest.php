<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function viewing_all_product_list()
    {
        $this->withoutExceptionHandling();
        $this->post('/product/store', [
            'name' => 'product1',
            'description' => 'this is product one',
            'price' => 10,
            'image' => '/images/01'
        ]);
        $this->post('/product/store', [
            'name' => 'product2',
            'description' => 'this is product twoo',
            'price' => 8,
            'image' => '/images/02'
        ]);
        $this->post('/product/store', [
            'name' => 'product3',
            'description' => 'this is product three',
            'price' => 6,
            'image' => '/images/03'
        ]);
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
        $response->assertRedirect('/products');
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/product/store', [
            'name' => 'product1',
            'description' => 'this is product one',
            'price' => 10,
            'image' => '/images/01'
        ]);

        $product = Product::first();
        $this->delete('/product/' . $product->id);

        $this->assertCount(0, Product::all());
        $response->assertRedirect('/products');
    }
}
