<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = Category::query()->with(['parent', 'children'])->get();

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        /** @var Category $category */
        $category = Category::query()->create($request->validated());

        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        $result = $category->update($request->validated());

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        $result = false;

        // todo check why this shit does not work in policy
        if ($category->links->isEmpty()) {
            $result = $category->delete();
        }

        return response()->json($result);
    }
}
