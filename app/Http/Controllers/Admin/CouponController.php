<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index() { return view('admin.coupons'); }
    public function create() { return view('admin.coupon_create'); }
    public function store() {}
    public function edit($id) { return view('admin.coupon_edit'); }
    public function update($id) {}
    public function destroy($id) {}
}
