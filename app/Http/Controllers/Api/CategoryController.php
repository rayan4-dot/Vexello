<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
        protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() :JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request) :JsonResponse
    {
        $category = $this->categoryService->createCategory($request->validated());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) :JsonResponse
    {
        $categories = $this->categoryService->getCategoryById($id);

        return !$categories ? response()->json(['message'=> 'Category not found'], 404) : response()->json;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, int $id) :JsonResponse
    {
      
        $updated = $this->categoryService->updateCategory($id, $request->validated());
        return !$updated ? response()->json(['message'=>'Category not found or cannot be updated ']) : response()->json(['message' => 'Category updated successfully'],201);
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $deleted = $this->categoryService->deleteCategory($id);

        return !$deleted ? response()->json(['message' => 'Category not found or delete failed'], 404)  : response()->json(['message' => 'Category deleted successfully']);
    
    }
}
