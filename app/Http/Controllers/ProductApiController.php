<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    private ProductRepository $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    
    public function index()
    {
        $product = $this->productRepo->read();

        if (isset($product['error'])) return response()->json($product, 500);

        return response()->json($product, 201);
    }

    public function selectproduct(int $id){
        $product = $this->productRepo->productSelect($id);

        if (isset($product['error'])) return response()->json($product, 500);

        return response()->json($product, 201);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string',
            'stock_amount' => 'required|numeric',
            'client_id' => 'required|integer',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $product = $this->productRepo->create($request);

        if (isset($product['error'])) return response()->json($product, 500);

        return response()->json($product, 201);
    }

    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'sku' => 'string',
            'stock_amount' => 'numeric',
            'client_id' => 'integer',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $product = $this->productRepo->update($id, $request);

        if (isset($product['error'])) return response()->json($product, 500);

        return response()->json($product, 201);
    }

    public function delete(int $id)
    {
        $product = $this->productRepo->delete($id);

        if (isset($product['error'])) return response()->json($product, 500);

        return response()->json(['result' => $product], 201);
    }
}
