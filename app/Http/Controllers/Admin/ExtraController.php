<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ExtraController extends Controller
{
    public function index() {
        $extras = \App\Models\Extra::all();
        return view('admin.extras', compact('extras'));
    }
    public function create() { return view('admin.extra_create'); }
    public function store() {
        \App\Models\Extra::create(request()->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ]));
        return redirect()->route('admin.extras.index')->with('success', 'Extra creado correctamente');
    }
    public function edit($id) {
        $extra = \App\Models\Extra::findOrFail($id);
        return view('admin.extra_edit', compact('extra'));
    }
    public function update($id) {
        $extra = \App\Models\Extra::findOrFail($id);
        $extra->update(request()->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ]));
        return redirect()->route('admin.extras.index')->with('success', 'Extra actualizado correctamente');
    }
    public function destroy($id) {}
}
