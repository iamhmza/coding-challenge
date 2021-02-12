<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Category;

class CategoryManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_category_can_be_created()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/category/store', [
            'name' => 'tech'
        ]);

        $response->assertSuccessful();
        $this->assertCount(1, Category::all());
    }
}
