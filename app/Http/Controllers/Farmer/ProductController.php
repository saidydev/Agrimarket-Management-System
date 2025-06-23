<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        // specific for user
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('farmer.products.index', compact('products'));
    }

    public function show(Product $product) {
        return view('farmer.products.show', compact('product'));
    }
}
