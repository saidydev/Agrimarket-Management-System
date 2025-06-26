<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuantityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $products = Product::with('category', 'quantityType')->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10);
        return view('farmer.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $quantityTypes = QuantityType::all();
        return view('farmer.products.create', compact('categories', 'quantityTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'category_id' => 'required|exists:product_categories,id',
            'quantity_type_id' => 'required|exists:quantity_types,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->quantity_type_id = $request->quantity_type_id;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'farmer/products';
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                . '-' . time()
                . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, 'public');
            $product->photo = $path . '/' . $filename;
        }

        $product->save();

        return redirect()->route('farmer.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('farmer.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $quantityTypes = QuantityType::all();

        return view('farmer.products.edit', compact('product', 'categories', 'quantityTypes'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'category_id' => 'required|exists:product_categories,id',
            'quantity_type_id' => 'required|exists:quantity_types,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->quantity_type_id = $request->quantity_type_id;

        if ($request->hasFile('image')) {
            if ($product->photo) {
                \Storage::disk('public')->delete($product->photo);
            }

            $file = $request->file('image');
            $path = 'farmer/products';
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                . '-' . time()
                . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, 'public');
            $product->photo = $path . '/' . $filename;
        }

        $product->save();

        return redirect()->route('farmer.products.show', compact('product'))->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->photo) {
            \Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('farmer.products.index')->with('success', 'Product deleted successfully.');
    }

    public function refill(Request $request, Product $product) {
        $request->validate([
            'quantity' => 'required|string',
        ]);

        $product->quantity += $request->quantity;
        $product->save();

        return redirect()->route('farmer.products.show', compact('product'))->with('success', 'Product refilled successfully.');
    }
}
