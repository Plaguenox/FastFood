<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = \App\Models\Category::orderBy('id', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }
    public function create() { return view('admin.category_create'); }
    public function store() {
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        \App\Models\Category::create(request()->only('name', 'description'));
        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
    }
    public function edit($id) {
        $category = \App\Models\Category::findOrFail($id);
        return view('admin.category_edit', compact('category'));
    }
    public function update($id) {
        $category = \App\Models\Category::findOrFail($id);
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category->update(request()->only('name', 'description'));
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
    }
    public function destroy($id) {
        $category = \App\Models\Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
