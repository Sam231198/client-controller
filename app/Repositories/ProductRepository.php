<?php

namespace App\Repositories;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductRepository
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function read()
    {
        try {
            return $this->product->all();
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function create(Request $request)
    {
        try {
            return $this->product->create($request);
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            return $this->product
                ->where('id', $id)
                ->update($request);
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function delete(int $id)
    {
        try {
            return $this->product
                ->where('id', $id)
                ->delete();
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
