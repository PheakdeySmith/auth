<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        $products = Product::when($search, function($query, $search) {
            return $query->where('product_name', 'like', "%{$search}%")
                         ->orWhere('product_code', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'price' => 'required|numeric',
            'category_name' => 'required',
            'stock_quantity' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productData = $request->only(['product_code', 'product_name', 'price', 'category_name', 'stock_quantity', 'description']);

        if ($request->hasFile('image')) {
            $productData['image'] = $request->file('image')->store('product_images', 'public');
        }

        Product::create($productData);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code,' . $id,
            'product_name' => 'required',
            'price' => 'required|numeric',
            'category_name' => 'required',
            'stock_quantity' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $productData = $request->only(['product_code', 'product_name', 'price', 'category_name', 'stock_quantity', 'description']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $productData['image'] = $request->file('image')->store('product_images', 'public');
        }

        $product->update($productData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
