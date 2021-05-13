<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    private Product $product;
    private Client $client;

    public function __construct()
    {
        $this->product = new Product();
        $this->client = new Client();
    }

    public function read()
    {
        try {
            return $this->product->all();
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function productSelect(int $id)
    {
        try {

            $result = $this->product
                ->where('id', $id)
                ->get();

            if ($result)
                return $result;
            else
                return ['erro' => 'Produto não encontrado'];
        } catch (\Exception $e) {

            return ["error" => $e->getMessage()];
        }
    }

    public function create(Request $request)
    {
        try {
            $client = $this->client->where('id', $request->client_id)->count();

            if ($client)
                return $this->product->create($request->all());
            else
                return ["error" => "clente não existente"];
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $client = $this->client->where('id', $request->client_id)->count();

            if (!$client)
                return ["error" => "clente não existente"];

            return $this->product
                ->where('id', $id)
                ->update($request->all());

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
