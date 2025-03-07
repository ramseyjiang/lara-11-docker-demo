<?php

namespace Tests\Feature\api;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_product()
    {
        $data = ['name' => 'Phone', 'price' => 699.99];
        $response = $this->postJson('/api/products', $data);
        $response->assertStatus(201)->assertJson($data);
    }

    public function test_can_get_products()
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
    }

    public function test_update_products()
    {
        $product = Product::factory()->create();

        $response = $this->putJson("/api/products/{$product->id}", [
            'name' => 'Updated Name',
            'price' => 88.8
        ]);

        $response->assertOk()
            ->assertJsonPath('name', 'Updated Name');
    }

    public function test_delete_products()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");
        $response->assertOk();
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
