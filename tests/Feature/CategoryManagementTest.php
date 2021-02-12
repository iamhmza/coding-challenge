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
        $response = $this->post('/category/store', [
            'name' => 'tech'
        ]);

        $response->assertSuccessful();
        $this->assertCount(1, Category::all());
    }

    /** @test */
    public function a_category_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->post('/category/store', [
            'name' => 'tech'
        ]);
        $category = Category::first();
        $response = $this->delete('/category/' . $category->id);
        $this->assertCount(0, Category::all());
    }
}
