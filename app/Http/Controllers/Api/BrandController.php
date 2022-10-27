<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();

        return response()->json([
            'brands' => $brand
        ]);
    }


    public function create()
    {
        //
    }


    public function store(BrandRequest $request)
    {
        $brand = Brand::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'brand added',
            'brand' => $brand,
        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return response()->json([
            'message' => 'brand updated',
            'brand' => $brand,
        ]);
    }



    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json([
            'message' => 'category deleted',
            'brand' => $brand,
        ]);
    }
}
