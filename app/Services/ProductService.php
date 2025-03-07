<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct($product, array $data): \App\Models\Product
    {
        return $this->productRepository->update($product, $data);
    }

    public function deleteProduct($product): ?bool
    {
        return $this->productRepository->delete($product);
    }
}
