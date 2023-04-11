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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = Category::query()->with(['parent', 'children'])->get();

        return view('temp.category-list', compact('categories'));
//        return $categories->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temp.category-create');
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

        return back()->withInput()->with('status', 'Category created!');
        return response($category, Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        return view('temp.category-edit', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        return $category->toJson(); // todo json response resource
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        $result = $category->update($request->validated());

        return $result; // todo json response
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
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

        return $result;
    }
}
