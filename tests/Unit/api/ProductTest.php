<?php

namespace Tests\Unit\api;

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 99.99,
            'stock' => 10
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    public function test_update_product()
    {
        $product = Product::factory()->create();
        $product->update(['name' => 'Updated Product']);

        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    public function test_delete_product()
    {
        $product = Product::factory()->create();
        $product->delete();

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
