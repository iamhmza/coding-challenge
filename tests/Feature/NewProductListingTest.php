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
        $this->withoutExceptionHandling();
        $response = $this->post('/product/store', [
            'name' => 'product1',
            'description' => 'this is product one',
            'price' => 10,
            'image' => '/images/01'
        ]);

        $response->assertOk();
        $this->count(1, Product::all());
    }
}
