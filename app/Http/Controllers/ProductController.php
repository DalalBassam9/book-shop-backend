<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\Website\ProductResource;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function getProducts()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return ProductResource::collection($products);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function getProductDetails(string $id)
    {
        $product  = Product::findOrFail($id);
        return new ProductResource($product);
    }
}
