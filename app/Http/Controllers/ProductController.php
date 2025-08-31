<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        $page_title = 'Products';
        return view('backend.products.index', compact('products', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Add New Product';
        return view('backend.products.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'duration' => 'nullable|string|max:255',
            'people' => 'nullable|integer|min:1',
            'package' => 'nullable|string|max:255',
            'original_price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'transportation' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'product_types' => 'nullable|array',
            'product_types.*' => 'string',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = $imageName;
        }

        Product::create([
            'heading' => $validated['heading'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'date' => $validated['date'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'people' => $validated['people'] ?? null,
            'package' => $validated['package'] ?? null,
            'original_price' => $validated['original_price'] ?? null,
            'discounted_price' => $validated['discounted_price'] ?? null,
            'location' => $validated['location'] ?? null,
            'transportation' => $validated['transportation'] ?? null,
            'content' => $validated['content'] ?? null,
            'image' => $imagePath,
            'product_types' => $request->input('product_types'),
            'status' => (bool)($request->input('status', 1)),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $page_title = 'Edit Product';
        return view('backend.products.update', compact('product', 'page_title'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'heading' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'duration' => 'nullable|string|max:255',
            'people' => 'nullable|integer|min:1',
            'package' => 'nullable|string|max:255',
            'original_price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'transportation' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
            'product_types' => 'nullable|array',
            'product_types.*' => 'string',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path('uploads/products/'.$imagePath))) {
                @unlink(public_path('uploads/products/'.$imagePath));
            }
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = $imageName;
        }

        $product->update([
            'heading' => $validated['heading'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'date' => $validated['date'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'people' => $validated['people'] ?? null,
            'package' => $validated['package'] ?? null,
            'original_price' => $validated['original_price'] ?? null,
            'discounted_price' => $validated['discounted_price'] ?? null,
            'location' => $validated['location'] ?? null,
            'transportation' => $validated['transportation'] ?? null,
            'content' => $validated['content'] ?? null,
            'image' => $imagePath,
            'product_types' => $request->input('product_types'),
            'status' => (bool)($request->input('status', 1)),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path('uploads/products/'.$product->image))) {
            @unlink(public_path('uploads/products/'.$product->image));
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}


