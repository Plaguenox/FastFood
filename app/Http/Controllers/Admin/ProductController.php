<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $products = \App\Models\Product::with('category')->orderBy('id', 'desc')->get();
        return view('admin.products', compact('products'));
    }
    public function create() {
    $categories = \App\Models\Category::all();
    $extras = \App\Models\Extra::all();
    return view('admin.product_create', compact('categories', 'extras'));
    }
    public function store() {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extras' => 'array',
            'extras.*' => 'exists:extras,id',
        ]);
        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('products', 'public');
        }
        $product = \App\Models\Product::create($data);
        if (isset($data['extras'])) {
            $product->extras()->sync($data['extras']);
        }
    return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente.');
    }
    public function edit($id) {
    $product = \App\Models\Product::with('extras')->findOrFail($id);
    $categories = \App\Models\Category::all();
    $extras = \App\Models\Extra::all();
    return view('admin.product_edit', compact('product', 'categories', 'extras'));
    }
    public function update($id) {
        $product = \App\Models\Product::findOrFail($id);
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extras' => 'array',
            'extras.*' => 'exists:extras,id',
        ]);
        if (request()->hasFile('image')) {
            $data['image'] = request()->file('image')->store('products', 'public');
        }
        $product->update($data);
        if (isset($data['extras'])) {
            $product->extras()->sync($data['extras']);
        } else {
            $product->extras()->detach();
        }
            return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }
    public function destroy($id) {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
