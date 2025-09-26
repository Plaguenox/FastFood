<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DeliverymanController extends Controller
{
    public function index() { return view('admin.deliverymen'); }
    public function create() { return view('admin.deliveryman_create'); }
    public function store() {}
    public function edit($id) { return view('admin.deliveryman_edit'); }
    public function update($id) {}
    public function destroy($id) {}
}
