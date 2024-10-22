<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        //TODO Create and save the brand using validated data
        $brand = Brand::create($request->validated());

        //TODO Return a success response with the created brand
        return response()->json([
            'message' => 'Brand created successfully!',
            'data' => $brand,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //TODO Update the brand with validated data
        $brand->update($request->validated());

        //TODO Return a success response
        return response()->json([
            'message' => 'Brand updated successfully!',
            'data' => $brand,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //TODO Delete the brand
        $brand->delete();

        //TODO Return a success response
        return response()->json([
            'message' => 'Brand deleted successfully!',
        ], 200);
    }
}
