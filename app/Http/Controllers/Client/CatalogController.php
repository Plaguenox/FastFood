<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('client.catalog', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::with('extras', 'category')->findOrFail($id);
        return view('client.product', compact('product'));
    }
}
