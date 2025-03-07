<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getAllProducts();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        return $this->productService->createProduct($data);
    }

    public function show(Product $product)
    {
        return $this->productService->getProductById($product->id);
    }

    public function update(Request $request, Product $product): Product
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric'
        ]);

        return $this->productService->updateProduct($product, $data);
    }

    public function destroy(Product $product): \Illuminate\Http\JsonResponse
    {
        $this->productService->deleteProduct($product);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
