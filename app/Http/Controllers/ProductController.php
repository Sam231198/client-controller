<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    private ProductRepository $productRep;

    public function __construct()
    {
        $this->productRep = new ProductRepository();
    }

    public function index()
    {
        $product = $this->productRep->read();

        return Inertia::render('Productlist')->with('products', $product);
    }

    public function updateView(int $id)
    {
        $product = $this->productRep->productSelect($id);

        return Inertia::render('Productformupdate')->with('product', $product);
    }
}
