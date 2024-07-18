<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand', 'category')->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('products', compact('products', 'brands', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('productImages', $image, 'image');

        product::create([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,
            'image' => $path,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();

        return view('products', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('productImages', $image, 'image');

        $product = Product::findorFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,
            'image' => $path,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::findorFail($id)->delete();

        return redirect()->route('products.index');
    }
}
