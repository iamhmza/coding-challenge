<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewProductListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function we_should_be_able_to_create_product()
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
