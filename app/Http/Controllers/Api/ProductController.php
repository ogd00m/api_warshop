<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return response()->json([
            'product' => $product
        ]);
    }


    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'season_id' => $request->season_id,
            'brand_id' => $request->brand_id,
        ]);

        return response()->json([
            'message' => 'product added',
            'product' => $product,
        ], 200);
    }


    public function show(Product $product)
    {
        $product = Product::with('comments.user')->find($product);

        return response()->json([
            'status' => true,
            'products' => $product->toArray()
        ], 200);
    }


    public function edit($id)
    {
        //
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return response()->json([
            'message' => 'product updated',
            'product' => $product,
        ]);
    }

    public function search($name){
        return  Product::where('name', 'like', '%'. $name . '%')->get();
    }



    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'product deleted',
            'product' => $product,
        ]);
    }
}
