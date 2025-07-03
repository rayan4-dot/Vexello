<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
        protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) :JsonResponse
    {
        $produit = $this->productService->createProduct($request->validated());
        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) :JsonResponse
    {
           $product = $this->productService->getProductById($id);

           return !$product ? response()->json(['message'=> 'Product not found', 401]) : response()->json($product,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, int $id) :JsonResponse
    {
        $updated = $this->productService->updateProduct($request->validated());
       return !$updated ? response()->json(['message'=>'product cannot be updated or not found'],401) : respone()->json($updated,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) :JsonResponse
    {
        $deleted = $this->productService->deleteProduct($id);
               return !$deleted ? response()->json(['message'=>'product cannot be deleted or not found'],401) : respone()->json($deleted,201);

    }
}
